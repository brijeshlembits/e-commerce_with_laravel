<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Expectation;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function googlecallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();
    
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('redirect');
            } else {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('123456dummy'), // Use bcrypt for password hashing
                ]);
    
                Auth::login($newuser);
                return redirect()->intended('redirect');
            }
        } catch (Exception $e) { // Change Expectation to Exception
            // dd($e->getMessage()); // Use getMessage() to retrieve the exception message
            return $e->getMessage();
        }
    }
}
