<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $user = new User();
    }
}
