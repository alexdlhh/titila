<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Novios;
use App\Models\Invitados;
use App\Models\NoviosRel;
use App\Models\MediaSvg;
use App\Models\Media;
use App\Models\NoviosPreferencias;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Muestra la vista de login
     * @return \Illuminate\View\View
     */
    public function login(){
        // Si el usuario está autenticado, redirige a la vista principal del panel
        if (Auth::check()) {
            dd(Auth::User());
            return redirect()->route('panel');
        }

        // Si el usuario no está autenticado, muestra la vista de login
        return view('auth.login');
    }

    /**
     * Autentica al usuario
     * @param Request $request
     * @return Response $response
     */
    public function do_login(Request $request){
        // Valida los datos del formulario de login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intenta autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Redirige al usuario a la vista principal del panel
            return response()->json(['success' => Auth::user()->role], 200);
        }

        // Si la autenticación falla, muestra un error
        return response()->json(['error' => 'Los datos ingresados son incorrectos.'], 401);
    }

    public function logout(){
        // Cierra la sesión del usuario
        Auth::logout();

        // Redirige al usuario a la vista de login
        return redirect()->route('login');
    }

    /**
     * Muestra la vista de registro
     * @return \Illuminate\View\View
     */
    public function register(){
        // Muestra la vista de registro
        return view('auth.register');
    }

    /**
     * Registra un nuevo usuario
     * @param Request $request
     * @return String $role
     */
    public function do_register(Request $request){
        // Valida los datos del formulario de registro
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        // Crea un nuevo usuario
        $user = new User();
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->role = $request->role;
        $user->action = !empty($request->action)?$request->action:'';
        $user->place = !empty($request->place)?$request->place:'';
        $user->save();

        // Inicia sesión con el usuario recién creado
        Auth::login($user);

        // Redirige al usuario a la vista principal del panel
        return $user->role;
    }

    /**
     * Muestra la vista principal del panel Admin
     * @return \Illuminate\View\View
     */
    public function adminPanel(){
        $cities = Ciudad::all();
        $novios = Novios::all();
        $invitados = Invitados::all();

        $admin['section'] = 'adminPanel';
        $admin['cities'] = $cities;
        $admin['novios'] = $novios;
        $admin['invitados'] = $invitados;
        return view('admin.adminPanel')->with('admin', $admin);
    }

    /**
     * Muestra la vista principal del panel Couple
     * @return \Illuminate\View\View
     */
    public function saveTheDatePanel(){
        $admin['section'] = 'saveTheDatePanel';
        return view('couple.saveTheDatePanel')->with('admin', $admin);
    }

    /**
     * Muestra la vista principal del panel Guest
     * @return \Illuminate\View\View
     */
    public function guestPanel(){
        $admin['section'] = 'guestPanel';
        return view('guest.guestPanel')->with('admin', $admin);
    }

    /**
     * Muestra la vista de diseño de invitación
     * @return \Illuminate\View\View
     */
    public function desing(){
        $admin['section'] = 'desing';
        $novios = Novios::where('id', Auth::user()->rel)->first();
        $novios_rel = NoviosRel::where('id_novio', $novios->id)->first();
        $svgs = MediaSvg::where('id_ciudad', $novios_rel->id_ciudad)->get();
        $admin['novios_preferencias'] = NoviosPreferencias::where('id_novio', $novios->id)->first();
        $admin['media'] = Media::where('id_novio', $novios->id)->get();
        $admin['novios'] = $novios;
        $admin['novios_rel'] = $novios_rel;
        $admin['svgs'] = $svgs;
        return view('couple.desing')->with('admin', $admin);
    }

    /**
     * Guardamos las preferencias de los novios
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function savePreferences(Request $request){
        try{
            $novios = Novios::where('id', Auth::user()->rel)->first();
            $novios_rel = NoviosRel::where('id_novio', $novios->id)->first();
            if(!empty($request->imagenes)){
                foreach($request->imagenes as $imagen){
                    //guardamos la imagen en public/images/saveTheDate
                    $original_name = $imagen->getClientOriginalName();
                    $nombre = time().$original_name.'.'.$imagen->getClientOriginalExtension();
                    $destino = public_path('images/saveTheDate');
                    $imagen->move($destino, $nombre);
                    $ruta_imagen = '/images/saveTheDate/'.$nombre;
                    //creamos el registro en la tabla media
                    $media = new Media();
                    $media->id_novio = $novios->id;
                    $media->tipo = 'imagen';
                    $media->ruta = $ruta_imagen;
                    $media->save();
                }
            }
            $novios_rel->id_media_svg = $request->svg_selected;
            $novios_rel->save();
            $novios_preferencias = NoviosPreferencias::where('id_novio', $novios->id)->first();
            if(empty($novios_preferencias)){
                $novios_preferencias = new NoviosPreferencias();
                $novios_preferencias->id_novio = $novios->id;
            }
            $novios_preferencias->title_size = $request->title_size=='null'?0:$request->title_size;
            $novios_preferencias->text_size = $request->text_size=='null'?0:$request->text_size;
            $novios_preferencias->color_text = $request->color_text ?? '';
            $novios_preferencias->message = $request->message ?? '';
            $novios_preferencias->langs = $request->langs;
            $novios_preferencias->show_restaurants = $request->show_restaurants ?? 0;
            $novios_preferencias->show_gifts = $request->show_gifts ?? 0;
            $novios_preferencias->show_city = $request->show_city ?? 0;
            $novios_preferencias->show_hotel = $request->show_hotel ?? 0;
            $novios_preferencias->save();
        }catch(Exception $e){
            return response()->json(['success' => false, 'mesage' => $e->getMessage()], 401);
        }
        return response()->json(['success' => true, 'message' => 'Preferencias guardadas correctamente.'], 200);
    }

    public function deleteMedia(Request $request){
        try{
            $media = Media::where('id', $request->id)->first();
            $media->delete();
        }catch(Exception $e){
            return response()->json(['success' => false, 'mesage' => $e->getMessage()], 401);
        }
        return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente.'], 200);
    }

    /**
     * Muestra la vista de invitados
     * @return \Illuminate\View\View
     */
    public function guests(){
        $admin['section'] = 'guests';
        return view('couple.guests')->with('admin', $admin);
    }
}
