<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function showAllRenting()
    {
        Gate::authorize('visit-return-rental-page');

        $userID = auth()->id();

        $ongoingLeases = User::find($userID)->leases()->whereNull('staff_confirm')->get();
        $rentings = [];

        foreach ($ongoingLeases as $ongoingLease) {
            $pcInfo = Computer::find($ongoingLease->computer_id);

            $rentings[] = (object)[
                'picture' => $pcInfo->picture,
                'name' => $pcInfo->name,
                'lease_id' => $ongoingLease->id,
                'start_time' => $ongoingLease->start_time,
                'end_time' => $ongoingLease->end_time,
                'return_time' => $ongoingLease->return_time,
                'staff_confirm' => $ongoingLease->staff_confirm,
                'insurance' => $ongoingLease->insurance,
                'fee' => $ongoingLease -> fee,
            ];
        }

        return view('rental-return', [
            'rentings' => $rentings,
        ]);
    }
}
