<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToProvider($provider=null)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider=null)
    {

        $socialUser = Socialite::driver($provider)->user();

//        dd($provider,$socialUser);
        if ($provider === 'facebook' || $provider === 'google')
        {
        $email= $socialUser->getEmail();
        $name= $socialUser->getName();

        $user = User::firstOrCreate([
            'email' =>  $email,
        ],[
            'name' => $name,
            'email' =>  $email,
            'password' => Hash::make($email),
        ]);
        }
        elseif ($provider === 'github'){
            $email= $socialUser->getEmail();
            $name= $socialUser->getNickname();
            $user = User::firstOrCreate([
                'email' =>  $email,
            ],[
                'name' => $name,
                'email' =>  $email,
                'password' => Hash::make($email),
            ]);}
//        elseif ($provider === 'google'){
//                    dd($provider,$socialUser);
////            $email= $socialUser->getEmail();
////            $name= $socialUser->getNickname();
////            $user = User::firstOrCreate([
////                'email' =>  $email,
////            ],[
////                'name' => $name,
////                'email' =>  $email,
////                'password' => Hash::make($email),
////            ]);
//        }


        Auth::login($user,true);

       return redirect()->route('dashboard');
    }
}
