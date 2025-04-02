<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gender;
use App\Models\Location;
use App\Models\User;
use App\Models\UserFinal;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        $locations = Location::all();
        $areas = Area::all();
        $generos = Gender::all();
        return view('auth.register', compact('locations','areas','generos'));
    }

    public function create(Request $request){
        $user = new User();
        $userF = new UserFinal();

        $user->names = $request->names;
        $user->last_name_p = $request->last_name_p;
        $user->last_name_m = $request->last_name_m;
        $user->sex_id = $request->input('sex');
        $user->password = $request->password;
        $user->email = $request->email;
        $user->employer_number = $request->employer_number;
        $user->rol_id = 'USUARIO';
        $user->save();

        $userF->empleados_id = $user->id;
        $userF->area_id = $request->input('area');
        $userF->ubicacion_id = $request->input('location');
        $userF->save();

        return redirect('/login');
    }
}
