<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){

        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function loginform(Request $request){
        $user=User::where('email', $request->email)->first();
       if(!$user || !Hash::check($request->password,$user->password)){
         return redirect()->back()->withErrors(["email"=>"email  ou password incorrect"]);
       }
       Auth::login($user);
        return redirect()->route('dashboard');
    }
    public function registerform(Request $request)
    {
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('auth.login')->with('success', 'Inscription réussie. Veuillez vous connecter.');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
    
}
