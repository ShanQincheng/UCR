<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RentComputerController extends Controller
{
    public function index()
    {
        //
    }

    public function rent(Request $request) {
        $totalRentalPrice = $this->costs($request);

        $userAccount = User::find(auth()->user()->id)->account;
        if ($userAccount->balance < $totalRentalPrice) {
            return back() -> with('warningMsg',
                'Costs: $'. $totalRentalPrice .'. Balance: $'. $userAccount->balance. ' not enough');
        }

        return view('pc-detail');
    }

    public function costs(Request $request) {
        $depositFee = 50;
        $insuranceFee = 10;

        $period = $request->input('period', null);
        $rent = $request->input('rent', null);
        $insurance = $request->input('insurance', null);
        $userID = auth()->user()->id;

        $user = User::find($userID);
        $privilege = $user->privilege;

        $totalRentalPrice = $depositFee + $period * $rent;
        // calculate insurance
        if ($insurance == "on") {
            $totalRentalPrice += $insuranceFee;
        }
        // calculate discount
        $totalRentalPrice = $totalRentalPrice - $totalRentalPrice * $privilege-> discount / 100;

        return $totalRentalPrice;
    }
}
