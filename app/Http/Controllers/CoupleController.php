<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Ciudad;
use App\Models\Restaurante;
use App\Models\Actividad;
use App\Models\Imperdible;
use App\Models\Estetica;
use App\Models\Alojamiento;
use App\Models\Transporte;
use App\Models\Invitados;
use App\Models\Galeria;
use App\Models\Media;
use App\Models\MediaSvg;
use App\Models\Menu;
use App\Models\Novios;
use App\Models\NoviosRel;
use App\Models\Patron;
use App\Models\Regalos;
use App\Models\NoviosPreferencias;

class CoupleController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = ['admin','couple'];
        $this->middleware('auth');
    }

    /**
     * comprobamos el role
     * @return void
     */
    public function checkRole(){
        if(!in_array(Auth::user()->role, $this->role)){
            return view('forbidden');
        }
    }

    /**
     * lista de invitados de la pareja
     * @param String $nombre
     * @param String $fecha
     * @param int $estado
     * @return \Illuminate\View\View
     */
    public function coupleList($nombre = '0', $fecha = '0', $estado = '0'){
        $this->checkRole();
    
        // Inicia la consulta
        $query = Novios::query();
    
        // Aplica los filtros si se proporcionan los parámetros
        if ($nombre!='0') {
            $query->where('novio', 'LIKE', '%' . $nombre . '%')->orWhere('novia', 'LIKE', '%' . $nombre . '%');
        }
    
        if ($fecha!='0') {
            $query->where('fecha_boda', 'LIKE', '%' . $fecha . '%');
        }
    
        if ($estado!='0') {
            $query->where('estado', $estado);
        }
    
        // Ejecuta la consulta
        $listNovios = $query->get();

        //todo lo que he seleccionado es lo que se encarga de filtrar la informacion que me trae la base de datos
        return view('couple.list',['novios' => $listNovios, 'filtroNombre' => $nombre, 'filtroFecha' => $fecha, 'filtroEstado' => $estado]); 
    }

    /**
     * lista de invitados de la pareja
     * @return \Illuminate\View\View
     */
    public function coupleGuestList(){
        $this->checkRole();
        $novios = Novios::all();
        $invitados = Invitados::all();
        return view('couple.guestList',['novios' => $novios, 'invitados' => $invitados]);
    }

    /**
     * editamos la pareja
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function coupleEdit($id){
        $this->checkRole();
        if(!empty($id)){
            $novio = Novios::where('id', $id)->first();
            $novios_rel = NoviosRel::where('id_novio', $novio->id)->first();
            $menu = Menu::where('id_novio', $novio->id)->get();
            $user = User::where('rel', $novio->id)->first();
        }else{
            $novio = [];
            $novios_rel = [];
            $menu = [];
            $user = [];
        }
        $cities = Ciudad::all();
        $selected_city = [];
        $restaurants_city = [];
        $activities_city = [];
        $must_see_city = [];
        $estetica_city = [];
        $alojamiento_city = [];
        $transporte_city = [];

        if(!empty($novios_rel->id_ciudad)){
            $selected_city = Ciudad::where('id', $novios_rel->id_ciudad)->first();
            $restaurants_city = Restaurante::where('id_ciudad', $novios_rel->id_ciudad)->get();
            $activities_city = Actividad::where('id_ciudad', $novios_rel->id_ciudad)->get();
            $must_see_city = Imperdible::where('id_ciudad', $novios_rel->id_ciudad)->get();
            $estetica_city = Estetica::where('id_ciudad', $novios_rel->id_ciudad)->get();
            $alojamiento_city = Alojamiento::where('id_ciudad', $novios_rel->id_ciudad)->get();
            $transporte_city = Transporte::where('id_ciudad', $novios_rel->id_ciudad)->get();
        }

        $data = [
            'restaurants_city' => $restaurants_city,
            'activities_city' => $activities_city,
            'must_see_city' => $must_see_city,
            'estetica_city' => $estetica_city,
            'alojamiento_city' => $alojamiento_city,
            'transporte_city' => $transporte_city,
        ];

        return view('couple.edit',['novio' => $novio, 'cities' => $cities, 'selected_city' => $selected_city, 'data' => $data, 'novios_rel' => $novios_rel, 'menu' => $menu, 'user' => $user]);
    }

    /**
     * Guardamos la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleSave(Request $request){
        try{
            $this->checkRole();
            $id = $request->id;
            if(!empty($id)){
                $novios = Novios::where('id', $id)->first();
            }else{
                $novios = new Novios();
            }
            $novios->novio = $request->novio;
            $novios->novia = $request->novia;
            $novios->fecha_boda = $request->fecha_boda;
            $novios->habilitar = $request->habilitar;
            $novios->publicar = $request->publicar;
            $novios->estado = $request->estado;
            $novios->programa = $request->programa;
            $novios->save();
            $id = $novios->id;
            $novio_rel = NoviosRel::where('id_novio', $id)->first();
            
            if(empty($novio_rel)){
                $novio_rel = new NoviosRel();
                $novio_rel->id_novio = $id;
            }            
            $novio_rel->id_ciudad = $request->city;
            $novio_rel->save();

            $user = User::where('rel', $id)->first();
            if(empty($user)){
                $user = new User();
                $user->name = $request->novio.' '.$request->novia;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->role = 'couple';
                $user->rel = $id;
            }else{
                $user->name = $request->novio.' '.$request->novia;
                $user->email = $request->email;
                if(!empty($request->password)){
                    $user->password = Hash::make($request->password);
                }
            }
            $user->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id]);
    }

    /**
     * guardamos el menu de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleMenu(Request $request){
        try{
            $this->checkRole();
            $id = $request->id;
            if(!empty($id)){
                $menu = Menu::where('id', $id)->first();
            }else{
                $menu = new Menu();
            }
            $menu->id_novio = $request->id_novio;
            $menu->cuerpo = $request->cuerpo ?? '';
            $menu->alergenos = $request->alergenos ?? '';
            $menu->nombre = $request->nombre ?? '';
            $menu->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id]);
    }

    /**
     * Borramos el menú
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleMenuDelete(Request $request){
        try{
            $this->checkRole();
            $id = $request->id;
            $menu = Menu::where('id', $id)->first();
            $menu->delete();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Borrado correctamente", "id" => $id]);
    }

    /**
     * guardamos la relacion de alojamiento de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleAccomodaionRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $alojamiento = explode(',', $request->alojamiento_id);
            if($request->status==1){
                $alojamiento[] = $request->alojamiento_id;
            }else{
                $alojamiento = array_diff($alojamiento, [$request->alojamiento_id]);
            }
            $alojamiento = implode(',', $alojamiento);
            $novios_rel->alojamiento = $alojamiento;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de transporte de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleTransportRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $transporte = explode(',', $request->transporte_id);
            if($request->status==1){
                $transporte[] = $request->transporte_id;
            }else{
                $transporte = array_diff($transporte, [$request->transporte_id]);
            }
            $transporte = implode(',', $transporte);
            $novios_rel->transporte = $transporte;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de imperdibles de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleMustSeeRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $imperdibles = explode(',', $novios_rel->imperdibles);
            if($request->status==1){
                $imperdibles[] = $request->must_id;
            }else{
                $imperdibles = array_diff($imperdibles, [$request->must_id]);
            }
            $imperdibles = implode(',', $imperdibles);
            $novios_rel->imperdibles = $imperdibles;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de estetica de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleSteticRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $estetica = explode(',', $novios_rel->estetica);
            if($request->status==1){
                $estetica[] = $request->stetic_id;
            }else{
                $estetica = array_diff($estetica, [$request->stetic_id]);
            }
            $estetica = implode(',', $estetica);
            $novios_rel->estetica = $estetica;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de actividades de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleActivityRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $actividades = explode(',', $novios_rel->actividades);
            if($request->status==1){
                $actividades[] = $request->activity_id;
            }else{
                $actividades = array_diff($actividades, [$request->activity_id]);
            }
            $actividades = implode(',', $actividades);
            $novios_rel->actividades = $actividades;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de restaurantes de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleRestaurantRel(Request $request){
        try{
            $this->checkRole();
            $id_novio = $request->id_novio;
            if(!empty($id_novio)){
                $novios_rel = NoviosRel::where('id_novio', $id_novio)->first();
            }else{
                return response()->json(["success"=>false,"message"=>"Algo ha salido mal"]);
            }
            $novios_rel->id_novio = $request->id_novio;
            $restaurants = explode(',', $novios_rel->restaurantes);
            if($request->status==1){
                $restaurants[] = $request->id_restaurante;
            }else{
                $restaurants = array_diff($restaurants, [$request->id_restaurante]);
            }
            $restaurants = implode(',', $restaurants);
            $novios_rel->restaurantes = $restaurants;
            $novios_rel->save();
        }catch(\Exception $e){
            return response()->json(["success"=>false,"message"=>"Algo ha salido mal", "error" => $e->getMessage()]);
        }
        return response()->json(["success"=>true,"message"=>"Guardado correctamente", "id" => $id_novio]);
    }

    /**
     * guardamos la relacion de media de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleMediaSVGRel(Request $request){
        $this->checkRole();
        $id_novio = $request->id_novio;
        $id_media_svg = $request->id_media_svg;
        if(!empty($id_novio)){
            $novios_rel = NoviosRel::where('id_novio', $id_novio)->where('id_media_svg', $id_media_svg)->first();
        }else{
            $novios_rel = new NoviosRel();
        }
        $novios_rel->id_novio = $id_novio;
        $novios_rel->id_media_svg = $id_media_svg;
        $novios_rel->save();
        return response()->json([
            'novios_rel' => $novios_rel,
        ]);
    }

    /**
     * A PARTIR DE AQUI ES PANEL DE NOVIOS
     */

    /**
     * Escritorio de la pareja
     * @return \Illuminate\View\View
     */
    public function coupleDash(){
        $this->checkRole();
        $novios = Novios::where('id_user', Auth::user()->place)->first();
        $novios_rel = NoviosRel::where('id_novio', $novios->id)->get();
        $novios_rel_arr = [];
        foreach($novios_rel as $novio_rel){
            $novios_rel_arr[] = $novio_rel->id_invitado;
        }
        $invitados = Invitados::all();
        return view('couple.dashboard',['novios' => $novios, 'invitados' => $invitados, 'novios_rel' => $novios_rel_arr]);
    }

    /**
     * Lista de invitados de la pareja
     * @return \Illuminate\View\View
     */
    public function coupleContacts(){
        $this->checkRole();
        $novios = Novios::where('id_user', Auth::user()->place)->first();
        $novios_rel = NoviosRel::where('id_novio', $novios->id)->get();
        $novios_rel_arr = [];
        foreach($novios_rel as $novio_rel){
            $novios_rel_arr[] = $novio_rel->id_invitado;
        }
        $invitados = Invitados::all();
        return view('couple.guest',['novios' => $novios, 'invitados' => $invitados, 'novios_rel' => $novios_rel_arr]);
    }

    /**
     * Vista de Diseño de la pareja
     * @return \Illuminate\View\View
     */
    public function coupleDesing(){
        $this->checkRole();
        $novios = Novios::where('id_user', Auth::user()->place)->first();
        $novios_rel = NoviosRel::where('id_novio', $novios->id)->get();
        $novios_rel_arr = [];
        foreach($novios_rel as $novio_rel){
            $novios_rel_arr[] = $novio_rel->id_invitado;
        }
        $invitados = Invitados::all();
        return view('couple.desing',['novios' => $novios, 'invitados' => $invitados, 'novios_rel' => $novios_rel_arr]);
    }

    /**
     * Añadimos un invitado a la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addContact(Request $request){
        $this->checkRole();
        $invitado = new Invitados();
        $invitado->nombre = $request->nombre;
        $invitado->invitados = $request->invitados;
        $invitado->confirmacion = $request->confirmacion;
        $invitado->email = $request->email;
        $invitado->telefono = $request->telefono;
        $invitado->id_novio = $request->id_novio;
        $invitado->save();
        return response()->json([
            'invitado' => $invitado,
        ]);
    }

    /**
     * Añadirmos invitados del csv a la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addContactCSV(Request $request){
        $this->checkRole();
        $file = $request->file('file');
        $csv = array_map('str_getcsv', file($file));
        $csv = array_slice($csv, 1);
        foreach($csv as $row){
            $invitado = new Invitados();
            $invitado->nombre = $row[0];
            $invitado->invitados = $row[1];
            $invitado->confirmacion = $row[2];
            $invitado->email = $row[3];
            $invitado->telefono = $row[4];
            $invitado->id_novio = $request->id_novio;
            $invitado->save();
        }
        return response()->json([
            'invitado' => $invitado,
        ]);
    }

    /**
     * Añadimos imagen a la galeria de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleGaleriaRel(Request $request){
        $this->checkRole();
        $file = $request->file('file');
        $galeria = new Galeria();
        $galeria->ruta = $file->store('galeria');
        $galeria->id_novio = $request->id_novio;
        $galeria->save();
        return response()->json([
            'galeria' => $galeria,
        ]);
    }

    /**
     * Guardamos las preferencias de diseño de la pareja
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function coupleSavePref(Request $request){
        $this->checkRole();
        $id_novio = $request->id_novio;
        if(!empty($id_novio)){
            $novios_preferencias = NoviosPreferencias::where('id_novio', $id_novio)->first();
        }else{
            $novios_preferencias = new NoviosPreferencias();
        }
        $novios_preferencias->novio = $request->novio;
        $novios_preferencias->novia = $request->novia;
        $novios_preferencias->fecha_boda = $request->fecha_boda;
        $novios_preferencias->fuente = $request->fuente;
        $novios_preferencias->color = $request->color;
        $novios_preferencias->font_size = $request->font_size;
        $novios_preferencias->mensaje = $request->mensaje;
        $novios_preferencias->id_media_svg = $request->id_media_svg;
        $novios_preferencias->title_size = $request->title_size;
        $novios_preferencias->color_fondo = $request->color_fondo;
        $novios_preferencias->color_texto = $request->color_texto;
        $novios_preferencias->patron = $request->patron;
        $novios_preferencias->id_novio = $request->id_novio;
        $novios_preferencias->save();
        return response()->json([
            'novios_preferencias' => $novios_preferencias,
        ]);
    }

    public function coupleDelete(Request $request){
        $this->checkRole();
        try{
            $id = $request->id;
            $novios = Novios::where('id', $id)->first();
            $novios->delete();
        }catch(\Exception $e){
            return response()->json([
                'status' => "error",
                'message' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'status' => "success",
        ]);
    }

}
