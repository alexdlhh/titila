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

class CityController extends Controller
{
    protected $role;

    public function __construct()
    {
        $this->role = ['admin'];
        $this->middleware('auth');
    }
    /**
     * obtenemos listado de ciudades en una tabla
     * @return \Illuminate\View\View
     */
    public function cityList(){
        $this->checkRole();
        $cities = Ciudad::all();
        $admin['section'] = 'cityList';
        return view('admin.cityList',['cities' => $cities, 'admin' => $admin]);
    }

    /**
     * obtenemos la vista de edición de una ciudad
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function cityEdit($id){
        $this->checkRole();
        $city = Ciudad::find($id);
        $restaurantes = Restaurante::where('id_ciudad', $id)->get();
        $actividades = Actividad::where('id_ciudad', $id)->get();
        $imperdibles = Imperdible::where('id_ciudad', $id)->get();
        $estetica = Estetica::where('id_ciudad', $id)->get();
        $alojamiento = Alojamiento::where('id_ciudad', $id)->get();
        $transporte = Transporte::where('id_ciudad', $id)->get();
        $admin['section'] = 'cityList';
        return view('admin.cityEdit',['city' => $city, 'admin' => $admin, 'restaurantes' => $restaurantes, 'actividades' => $actividades, 'imperdibles' => $imperdibles, 'estetica' => $estetica, 'alojamiento' => $alojamiento, 'transporte' => $transporte]);
    }

    /**
     * borramos una ciudad
     * @param Request $request
     * @return Response $response
     */
    public function cityDelete(Request $request){
        $this->checkRole();
        $city = Ciudad::find($request->id);
        $city->delete();
        return response()->json(['status' => 'success'], 200);
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
}
