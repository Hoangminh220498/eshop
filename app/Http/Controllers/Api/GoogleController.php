<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    const DRIVER_TYPE = 'google';

    public function redirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
        // dd(1);
    }

    public function callback()
    {
        try {
            $getInfo = Socialite::driver(static::DRIVER_TYPE)->user();
            $user = User::where('provider_id', $getInfo->id)->first();
            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::create([
                    'name' => $getInfo->name,
                    'email' => $getInfo->email,
                    'provider' => static::DRIVER_TYPE,
                    'provider_id' => $getInfo->id
                ]);
                Auth::login($newUser);
            }
        } catch (Exception $e) {
            dd($e);
        }
        // $this->createUser($getInfo, static::DRIVER_TYPE);
        // auth()->login($user);
        return redirect()->to('/home');
    }
}
