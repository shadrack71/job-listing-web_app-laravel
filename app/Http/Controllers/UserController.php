<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    public function show(){
        return view('login');
    }

     public function showRegister(){
        return view('register');
    }




    public function create(Request $request){
         $validateData = $request->validate(
                    [
                    'name' => 'required|string|max: 255',
                    'email' => ['required','email',Rule::unique('users','email')],
                    'password'=>'required|confirmed|min:6',
                    'role'=>'required|string'

                    ]);
            // hashing password
                $validateData['password'] =bcrypt($validateData['password']);
                $user =  User::create($validateData);
                auth()->login($user);
                
                return redirect(route('index'))->with('msg','Successfully registered');
  
        
    }

     public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin') {

                return redirect(route('admin_dashboard'));
            }else{
                 return redirect(route('user_dashboard'));

            }
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'))->with('msg','logout Successful'); 

    }
   
}