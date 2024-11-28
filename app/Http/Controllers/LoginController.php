<?php

namespace App\Http\Controllers;

use App\Mail\gmail;
use App\Models\User;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
   public function register(){
    return view('login.register');
   }

public function registerPost(Request $request){
    $profile = new profile();
    $request->validate([
        'FirstName' => 'required',
        'LastName' => 'required',
        'Username' => 'required',
        'Phone' => 'required',
        'email' => 'required|unique:profiles',
        'password' => 'required|min:8',
    ]);

    // Assigner les valeurs des champs

    $profile->FirstName = $request->input('FirstName');
    $profile->LastName = $request->input('LastName');
    $profile->Username = $request->input('Username');
    $profile->Phone = $request->input('Phone');
    $profile->email = $request->input('email');
    $profile->password = Hash::make($request->input('password'));

    // Sauvegarder l'utilisateur
    $profile->save();
    // Mail::to($profile->email)->send(new gmail($profile));
    return back()->with('success','successfully');
}
public function login(){
    return view('login.login');
}

public function loginpost(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        if(Auth::user()->email==='admin@gmail.com'){
            return redirect()->route('homeAdmin');
        }
        return redirect()->route('homeClient');
    } else {
        return back()->withErrors('Email ou mot de passe incorrecte');
    }
}
}
