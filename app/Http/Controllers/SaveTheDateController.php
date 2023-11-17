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
use App\Labels\Lang;
use App\Models\LibroDeFirmas;
use App\Models\Invitados;

class SaveTheDateController extends Controller
{

    protected $lang;
    protected $role;

    public function __construct(){
        $this->middleware('auth', ['except' => ['couple','familybookGet','familybookInsert']]);
        $lang = 'es';
        if(!empty($_COOKIE['lang'])){
            $lang = $_COOKIE['lang'];
        }else{
            setcookie('lang', $lang, time() + (86400 * 30), "/");
        }
        $this->lang = new Lang();
        $this->role = ['admin'];
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
     * renderizamos la vista del save the date
     * @param String $couple
     * @return \Illuminate\View\View
     */
    public function couple($couple, $hash){
        if($hash != '2d3e968fbb814f5c8999bca919f6e609'){
            return view('forbidden');
        }
        $_lang = !empty($_COOKIE['lang'])?$_COOKIE['lang']:'es';
        $libro = LibroDeFirmas::where('hash', $hash)->orderBy('created_at', 'desc')->get();
        $last=0;
        foreach($libro as $l){
            $last = $l->id;
            break;
        }
        return view('saveTheDate.index',['hash'=>$hash, 'couple' => $couple, 'lang' => $this->lang, '_lang' => $_lang, 'libro' => $libro, 'last' => $last]);
    }

    /**
     * Obtenemos el libro de firmas de la pareja y lo devolvemos en formato json
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function familybookGet(Request $request){
        $hash = $request->hash;
        $libro = LibroDeFirmas::where('hash', $hash)->orderBy('created_at', 'desc')->get();
        return response()->json([
            'libro' => $libro,
        ]);
    }

    /**
     * Guardamos un nuevo mensaje en el libro de firmas
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function familybookInsert(Request $request){
        $libro = new LibroDeFirmas();
        $libro->mensaje = $request->mensaje;
        $libro->nombre = $request->nombre;
        $libro->hash = $request->hash;
        $libro->save();
        return response()->json([
            'libro' => $libro,
        ]);
    }

    /**
     * Confirmamos la asistencia de un invitado
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmationInsert(Request $request){
        //buscamos por id_novio y nombre
        $invitado = Invitados::where('id_novio', $request->id_novio)->where('nombre', $request->nombre)->first();
        if(empty($invitado)){
            $invitado = new Invitados();
        }
        $invitado->nombre = $request->nombre;
        $invitado->invitados = $request->invitados;
        $invitado->confirmacion = $request->confirmacion;
        $invitado->id_novio = $request->id_novio;
        $invitado->save();
        return response()->json([
            'invitado' => $invitado,
        ]);
    }

}
