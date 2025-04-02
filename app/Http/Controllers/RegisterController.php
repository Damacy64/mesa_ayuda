<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gender;
use App\Models\Location;
use App\Models\User;
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
        $genero = new Gender();

        $user->names = $request->names;
        $user->last_name_p = $request->last_name_p;
        $user->last_name_m = $request->last_name_m;
        $genero->sexo = $request->sex;
        $user->sex_id = $genero->sexo;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->employer_number = $request->employer_number;
        $user->rol_id = 1;

        $user->save();

        return redirect('/registro');
    }
}
