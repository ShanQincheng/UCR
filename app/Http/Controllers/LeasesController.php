<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeasesController extends Controller
{
    public function customerReturn(Request $request)
    {
        $leaseID = $request->input('lease-id');

        Lease::find($leaseID)->update(['return_time' => time()]);

        return redirect(route('renting.customer'));
    }
}
