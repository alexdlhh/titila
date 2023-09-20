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
     * comprobamos el role
     * @return void
     */
    public function checkRole(){
        if(!in_array(Auth::user()->role, $this->role)){
            return view('forbidden');
        }
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
        return view('admin.cityEdit',['city' => $city, 'admin' => $admin, 'restaurantes' => $restaurantes, 'actividades' => $actividades, 'imperdibles' => $imperdibles, 'estetica' => $estetica, 'alojamiento' => $alojamiento, 'transporte' => $transporte, 'id' => $id]);
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
     * guardamos los datos basicos de una ciudad
     * @param Request $request
     * @return Response $response
     */
    public function citySave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es una ciudad nueva
            if($request->id == 0){
                $city = new Ciudad();
            }else{
                $city = Ciudad::find($request->id);
            }
            $city->nombre = $request->nombre;
            $city->alias = $request->alias;
            $city->descripcion = $request->descripcion;
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/cities/', $name);
                $city->portada = $name;
            }
            $city->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $city->id], 200);
    }

    /**
     * guardamos los datos de un restaurante
     * @param Request $request
     * @return Response $response
     */
    public function restaurantSave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es un restaurante nuevo
            if($request->id == 0){
                $restaurant = new Restaurante();
            }else{
                $restaurant = Restaurante::find($request->id);
            }
            $restaurant->id_ciudad = $request->id_ciudad;
            $restaurant->nombre = $request->nombre;
            $restaurant->descripcion = $request->descripcion;
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/restaurants/', $name);
                $restaurant->portada = $name;
            }
            $restaurant->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $restaurant->id], 200);
    }

    /**
     * eliminamos restaurante
     * @param Request $request
     * @return Response $response
     */
    public function restaurantDelete(Request $request){
        $this->checkRole();
        $restaurant = Restaurante::find($request->id);
        $restaurant->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * guardamos los datos de una actividad
     * @param Request $request
     * @return Response $response
     */
    public function activitySave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es una actividad nueva
            if($request->id == 0){
                $activity = new Actividad();
            }else{
                $activity = Actividad::find($request->id);
            }
            $activity->id_ciudad = $request->id_ciudad;
            $activity->nombre = $request->nombre;
            $activity->descripcion = $request->descripcion;
            //$activity->web = $request->web ?? '';
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/activity/', $name);
                $activity->portada = $name;
            }
            $activity->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $activity->id], 200);
    }

    /**
     * eliminamos actividad
     * @param Request $request
     * @return Response $response
     */
    public function activityDelete(Request $request){
        $this->checkRole();
        $activity = Actividad::find($request->id);
        $activity->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * guardamos los datos de un imperdible
     * @param Request $request
     * @return Response $response
     */
    public function mustSeeSave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es un imperdible nuevo
            if($request->id == 0){
                $mustSee = new Imperdible();
            }else{
                $mustSee = Imperdible::find($request->id);
            }
            $mustSee->id_ciudad = $request->id_ciudad;
            $mustSee->nombre = $request->nombre;
            $mustSee->descripcion = $request->descripcion;
            //$mustSee->web = $request->web ?? '';
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/mustSee/', $name);
                $mustSee->portada = $name;
            }
            $mustSee->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $mustSee->id], 200);
    }

    /**
     * eliminamos imperdible
     * @param Request $request
     * @return Response $response
     */
    public function mustSeeDelete(Request $request){
        $this->checkRole();
        $mustSee = Imperdible::find($request->id);
        $mustSee->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * guardamos los datos de una estetica
     * @param Request $request
     * @return Response $response
     */
    public function estheticsSave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es una estetica nueva
            if($request->id == 0){
                $estetica = new Estetica();
            }else{
                $estetica = Estetica::find($request->id);
            }
            $estetica->id_ciudad = $request->id_ciudad;
            $estetica->nombre = $request->nombre;
            $estetica->descripcion = $request->descripcion;
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/esthetics/', $name);
                $estetica->portada = $name;
            }
            $estetica->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $estetica->id], 200);
    }

    /**
     * eliminamos estetica
     * @param Request $request
     * @return Response $response
     */
    public function estheticsDelete(Request $request){
        $this->checkRole();
        $estetica = Estetica::find($request->id);
        $estetica->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * guardamos los datos de un alojamiento
     * @param Request $request
     * @return Response $response
     */
    public function accommodationSave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es un alojamiento nuevo
            if($request->id == 0){
                $accommodation = new Alojamiento();
            }else{
                $accommodation = Alojamiento::find($request->id);
            }
            $accommodation->id_ciudad = $request->id_ciudad;
            $accommodation->nombre = $request->nombre;
            $accommodation->descripcion = $request->descripcion;
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/accommodation/', $name);
                $accommodation->portada = $name;
            }
            $accommodation->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $accommodation->id], 200);
    }

    /**
     * eliminamos alojamiento
     * @param Request $request
     * @return Response $response
     */
    public function accommodationDelete(Request $request){
        $this->checkRole();
        $accommodation = Alojamiento::find($request->id);
        $accommodation->delete();
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * guardamos los datos de un transporte
     * @param Request $request
     * @return Response $response
     */
    public function transportSave(Request $request){
        $this->checkRole();
        try{
            //si el id es 0 es que es un transporte nuevo
            if($request->id == 0){
                $transport = new Transporte();
            }else{
                $transport = Transporte::find($request->id);
            }
            $transport->id_ciudad = $request->id_ciudad;
            $transport->nombre = $request->nombre;
            $transport->descripcion = $request->descripcion;
            //si hay imagen la guardamos
            if($request->hasFile('portada')){
                $file = $request->file('portada');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/transport/', $name);
                $transport->portada = $name;
            }
            $transport->save();
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
        return response()->json(['status' => 'success', 'id' => $transport->id], 200);
    }

    /**
     * eliminamos transporte
     * @param Request $request
     * @return Response $response
     */
    public function transportDelete(Request $request){
        $this->checkRole();
        $transport = Transporte::find($request->id);
        $transport->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
