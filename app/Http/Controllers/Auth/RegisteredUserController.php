<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use App\Models\User;
use App\Models\Account;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $customerPrivilegeID = Privilege::where('name', 'customer')->first();
        $user = User::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'email' => $request->email,
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->password),
            'privilege_id' => $customerPrivilegeID->id,   // default customer authorisation
        ]);

        // if new user claim himself a student
        if ($request->input('student_confirmation') == "on") {
            $studentPrivilegeID = Privilege::where('name', 'student')->first();
            $user->update(['privilege_id' => $studentPrivilegeID->id]);
        }

        // automatically create an account when a new user sign himself up
        $defaultBalance = 0;
        Account::create([
            'user_id' => $user->id,
            'balance' => $defaultBalance,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
