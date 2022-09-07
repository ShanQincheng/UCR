<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\DemoMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
     * Login with two-factor token
     *
     * @return \Illuminate\View\View
     */
    public function login(Request $request, $user_id, $login_token)
    {
        if (Auth::check()) {
            return view(RouteServiceProvider::HOME);
        }

        $user = User::find($user_id);

        if (strcmp($user->login_token, $login_token) !== 0) {
            return view('auth.login')->with('warningMsg', 'Token Expired');
        }

        Auth::loginUsingId($user_id);

        return redirect()->intended(RouteServiceProvider::HOME);
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

        // only do two factor authenticate after successfully authenticate
        $this->twoFactorLoginTokenGenerate($request);

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login-two-factor');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $modelTypeUser = User::find(Auth::user()->id);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //set an existing user instance as the currently authenticated user
        $this->removeTokenFromDBAfterASuccessfullyLogin($modelTypeUser);

        return redirect('/');
    }

    /*
     *  generate two-factor login token
     *
     * */
    private function twoFactorLoginTokenGenerate(LoginRequest $request) {
        $user = User::whereEmail($request->input("email"))->first();

        $token = uniqid();
        $user->update(['login_token' => $token]);

        // https://131.217.173.113/public/index.php/login/user-id/token
        $loginLink = "https://131.217.173.113/public/index.php/login/" . $user->id . '/' . $token;
        Mail::to($request->input("email"))->send(new DemoMail($user->first_name, $loginLink));
    }

    /*
     *  generate two-factor login token
     *
     * */
    private function removeTokenFromDBAfterASuccessfullyLogin(User $user) {
        $user->update(['login_token' => '']);
    }
}
