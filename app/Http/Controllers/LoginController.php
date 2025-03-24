<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        //$user = User::
    }
}
