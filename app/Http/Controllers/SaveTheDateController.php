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

class SaveTheDateController extends Controller
{

    protected $lang;

    public function __construct(){
        $lang = 'es';
        if(!empty($_COOKIE['lang'])){
            $lang = $_COOKIE['lang'];
        }else{
            setcookie('lang', $lang, time() + (86400 * 30), "/");
        }
        $this->lang = new Lang();
    }


    /**
     * renderizamos la vista del save the date
     * @param String $couple
     * @return \Illuminate\View\View
     */
    public function couple($couple){
        $_lang = !empty($_COOKIE['lang'])?$_COOKIE['lang']:'es';
        return view('saveTheDate.index',['couple' => $couple, 'lang' => $this->lang, '_lang' => $_lang]);
    }
}
