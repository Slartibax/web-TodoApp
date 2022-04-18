<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignInController extends Controller
{
    //Вывести форму
    public function show(){
        return view('signInForm');
    }




    //Валидация авторизации
    public function index(Request $request){
        return dd($request->all());
        //return view('testView')->with(['request' => $request->all()]);
    }
}
