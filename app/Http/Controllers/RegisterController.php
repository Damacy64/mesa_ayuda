<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Gender;
use App\Models\Location;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $locations = Location::all();
        $areas = Area::all();
        $generos = Gender::all();
        return view('auth.register', compact('locations','areas','generos'));
    }

    
}
