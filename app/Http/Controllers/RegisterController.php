<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function registerAction(Request $request){
         $validateData = $request->validate(
            [
            'name' => 'required|string|max: 255',
            'email' => 'required',
            'password'=>'required',
            ]
            );
            // check if user is already exist in the database 
           
            $pass1 = $request -> input('password');
            $pass2 = $request -> input('password2');
            if($pass1 === $pass2){
                User::create($validateData);
                return redirect(route('register',['msg'=>"user registered  successfully"]));
            }else{
                return redirect(route('register',['msg'=>"password does not match"]));

            }

        
    }
}