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

class SaveTheDateController extends Controller
{

    public function __construct(){
    }


    /**
     * renderizamos la vista del save the date
     * @param String $couple
     * @return \Illuminate\View\View
     */
    public function couple($couple){
        return view('saveTheDate.index',['couple' => $couple]);
    }
}
