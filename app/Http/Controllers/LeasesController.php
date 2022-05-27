<?php

namespace App\Http\Controllers;

use App\Models\BlackHistory;
use App\Models\Lease;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeasesController extends Controller
{
    public function customerReturn(Request $request)
    {
        $leaseID = $request->input('lease-id');

        Lease::find($leaseID)->update(['return_time' => time()]);

        return redirect(route('renting.customer'));
    }

    public function rentalManagement()
    {
        Gate::authorize('visit-manage-rental-page');

        $notConfirmedLeases = Lease::whereNull('staff_confirm')->get();
        $rentings = [];

        foreach ($notConfirmedLeases as $lease) {
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
                'insurance' => $lease->insurance,
                'fee' => $lease -> fee,
            ];
        }

        return view('manager.rental-manage', [
            'rentings' => $rentings,
        ]);
    }

    public function endingLease(Request $request) {
        $leaseID = $request->input('lease-id');
        $damage = $request->input('damage');
        $comment = $request->input('comment');
        $penalty = $request->input('penalty');

        $lease = Lease::find($leaseID);
        // update lease status
        $staffID = auth()->user()->id;
        $lease ->update([
            'damage' => $damage,
            'comment' => $comment,
            'staff_confirm' => $staffID,
        ]);

        // when a staff confirm the return of a computer before the leaseholder claim the return
        // at this situation, the return_time will be null.
        if ($lease->return_time == null) {
            $lease ->update([
                'return_time' => time(),
                'fee_penalty' => $penalty,
            ]);
        }

        // if damage exists, put a new black record for the user with the lease
        if ($damage != "No Damage") {
            BlackHistory::create([
                'user_id' => $lease->user_id,
                'lease_id' => $lease->id,
            ]);
        }

        // return deposit to user
        $balanceBefore = $lease->user->account->balance;
        $balanceAfter = $balanceBefore + $lease->deposit - $penalty;
        $lease->user->account->update([
            'balance' =>  $balanceAfter,
        ]);

        // increase stocks
        Computer::find($lease->computer_id)->increment('stocks');

        return redirect(route('renting.manager'));
    }
}
