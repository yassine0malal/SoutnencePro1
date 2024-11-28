<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){

        try{
            $google_user = Socialite::driver('google')->user();
            $user = profile::where('google_id', $google_user->getId())->first();
            if(!$user){
                $new_user = profile::create([
                    'Username' => $google_user->getName(),
                    'FirstName' => $google_user->getName(),
                    'LastName' => $google_user->getName(),
                    'Phone' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'password' => encrypt('password'),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }else{
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch(\Throwable $th) {
            dd('something went wrong!'. $th->getMessage());
        }
}
}
