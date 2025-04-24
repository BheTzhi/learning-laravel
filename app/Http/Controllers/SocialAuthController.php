<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $user = User::where('provider_id', $socialUser->getId())->where('provider_name', $provider)->first();

        if ($user) {
            Auth::login($user);
            return redirect('home');
        } else {
            $newUSer = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getName(),
                'email' => $socialUser->getEmail() ?? null,
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider,
                'avatar' => $socialUser->getAvatar() ?? null,
                'password' => bcrypt(uniqid()),
                'email_verified_at' => now()
            ]);

            Auth::login($newUSer);
            return redirect('/home');
        }
    }
}
