<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function topUp(Request $request)
    {
        $rechargeAmount = $request->input('recharge-amount');

        User::find(auth()->user()->id)->account->increment('balance', $rechargeAmount);

        return redirect(route('user.account'));
    }
}
