<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Computer;
use App\Models\Lease;
use App\Models\User;
use Illuminate\Http\Request;

class RentComputerController extends Controller
{
    public function index()
    {
        //
    }

    public function rent(Request $request) {
        $computerID = $request->input('computer-id', null);
        $period = $request->input('period', null);
        $rent = $request->input('rent', null);
        $insurance = $request->input('insurance', null);

        $userID = auth()->user()->id;
        $user = User::find($userID);
        $privilege = $user->privilege;

        $depositFee = 50;
        $insuranceFee = 0;
        if ($insurance == "on") {
            $insuranceFee = 10;
        }

        $totalFee = $this->costs($depositFee, $insuranceFee, $period, $rent, $privilege);

        $userAccount = $user->account;
        if ($userAccount->balance < $totalFee) {
            return back() -> with('warningMsg',
                'Costs: $'. $totalFee .'. Balance: $'. $userAccount->balance. ' not enough');
        }


        $newLease = $this->createLease(
            $userID, $computerID, $depositFee, $insuranceFee, $privilege->discount, $totalFee, $period);
        $this->decreaseAccountBalance($userAccount, $totalFee);

        $pcDetail = Computer::find($computerID);

        return view('rental-success', [
            'pcDetail' => $pcDetail,
            'lease' => $newLease,
        ]);
    }

    protected function createLease($userID, $computerID, $depositFee, $insuranceFee, $discount, $fee, $period) {
        $now = time();
        $newLease = Lease::create([
            'user_id' => $userID,
            'computer_id' => $computerID,
            'deposit' => $depositFee,
            'insurance' => $insuranceFee,
            'discount' => $discount,
            'fee' => $fee,

            'start_time' => $now,
            'end_time' => $now + $period * 3600,  // one hour has 3600 seconds
        ]);

        return $newLease;
    }

    protected function decreaseAccountBalance($account, $fee) {
        $balanceBefore = $account->balance;
        $balanceAfter = $balanceBefore - $fee;

        $account->update(['balance' => $balanceAfter]);
    }

    public function costs($depositFee, $insuranceFee, $period, $rent, $privilege) {
        // calculate normal costs
        $totalFee = $depositFee + $period * $rent;

        // calculate insurance
        $totalFee += $insuranceFee;

        // calculate discount
        $totalFee -= $totalFee * $privilege-> discount / 100;

        return $totalFee;
    }
}
