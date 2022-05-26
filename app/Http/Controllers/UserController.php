<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Lease;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userInfo()
    {
        $user = User::find(auth()->user()->id);
        $account = $user->account;

        $rentalHistory = $this->userRentalsHistory();

        return view('user.account', [
            'userInfo' => (object)[
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'balance' => $account->balance,
            ],

            'rentings' => $rentalHistory,
        ]);
    }

    public function editUserInfo(Request $request) {
        User::find(auth()->user()->id)->update([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
        ]);

        return redirect(route('user.account'));
    }

    protected function userRentalsHistory()
    {
        $allLeases = Lease::where('user_id', auth()->user()->id)->orderByDesc('start_time')->get();
        $rentings = [];

        foreach ($allLeases as $lease) {
            $pcInfo = Computer::find($lease->computer_id);
            $user = User::find($lease->user_id);

            $rentings[] = (object)[
                'picture' => $pcInfo->picture,
                'name' => $pcInfo->name,
                'lease_id' => $lease->id,
                'lease_holder' => $user->first_name.' '.$user->last_name,
                'lease_holder_email' => $user->email,
                'lease_holder_mobile' => $user->mobile,
                'lease_id' => $lease->id,
                'start_time' => $lease->start_time,
                'end_time' => $lease->end_time,
                'return_time' => $lease->return_time,
                'staff_confirm' => $lease->staff_confirm,
                'insurance' => $lease->insurance,
                'fee' => $lease -> fee,
            ];
        }

        return $rentings;
    }
}
