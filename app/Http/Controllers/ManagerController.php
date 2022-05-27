<?php

namespace App\Http\Controllers;

use App\Models\BlackHistory;
use App\Models\Computer;
use App\Models\Lease;
use App\Models\Privilege;
use App\Models\User;
use App\Models\Wines;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagerController extends Controller
{
    public function index() {
        Gate::authorize('visit-manage-computers-page');

        $computers = Computer::all();

        return view('manager.computer', [
            'computers' => $computers,
        ]);
    }

    public function addComputer(Request $request) {
        Computer::create([
            'name' => $request->input('pc-name'),
            'type' => $request->input('device-type'),
            'brand' => $request->input('brand'),
            'picture' => $request->input('picture'),
            'os' => $request->input('os'),
            'DISP_size' => $request->input('disp-size'),
            'RAM' => $request->input('ram'),
            'USB_port_num' => $request->input('usb-port-number'),
            'HDMI_port' => $request->input('hdmi-port-number'),
            'rent' => $request->input('rent'),
            'stocks' => $request->input('stocks'),
        ]);

        return redirect(route('computers.manager'));
    }

    public function editComputer(Request $request, $pcID) {
        Computer::find($pcID)->update([
            'name' => $request->input('name-pc-modal'),
            'type' => $request->input('type-pc-modal'),
            'brand' => $request->input('brand-pc-modal'),
            'picture' => $request->input('pic-pc-modal'),
            'os' => $request->input('os-pc-modal'),
            'DISP_size' => $request->input('disp-size-pc-modal'),
            'RAM' => $request->input('ram-pc-modal'),
            'USB_port_num' => $request->input('usb-port-num-pc-modal'),
            'HDMI_port' => $request->input('hdmi-port-num-pc-modal'),
            'rent' => $request->input('rent-pc-modal'),
            'stocks' => $request->input('stocks-pc-modal'),
        ]);

        return redirect(route('computers.manager'));
    }

    public function deleteComputer($toDelPCID) {
        if (Computer::find($toDelPCID)->renting()) {
            $computerName = Computer::find($toDelPCID)->name;
            return back()->with('warningMsg',
                $computerName.' has been rented out. Please confirm return first then can do the delete.');
        }

        Computer::find($toDelPCID)->delete();
        return json_encode("delete success");
    }

    public function staffUserManagement() {
        Gate::authorize('visit-staff-manage-users-page');

        $blackUserIDs = BlackHistory::selectRaw('user_id')
            ->groupBy('user_id')
            ->having(DB::raw('count(*)'), '>', 3)
            ->get();
        $blackUsers = User::whereIn('id', $blackUserIDs)->get();

        $privilegeCustomer = Privilege::select(['id', 'name'])->where('name', 'customer')->get();
        $customers = User::whereIn('privilege_id', $privilegeCustomer->pluck('id'))->get();

        return view('manager.staff-user', [
            'blackUsers' => $blackUsers,
            'customers' => $customers,
        ]);
    }

    public function adminUserManagement() {
        Gate::authorize('visit-admin-manage-users-page');

        $blackUserIDs = BlackHistory::selectRaw('user_id')
            ->groupBy('user_id')
            ->having(DB::raw('count(*)'), '>', 3)
            ->get();
        $blackUsers = User::whereIn('id', $blackUserIDs)->get();

        $privilegeCustomer = Privilege::select('id')->whereIn('name', ['customer', 'staff'])->get();
        $users = User::whereIn('privilege_id', $privilegeCustomer)->get();

        foreach ($users as $user) {
            $user->privilege_name = Privilege::find($user->privilege_id)->name;
        }
        return view('manager.admin-user', [
            'blackUsers' => $blackUsers,
            'users' => $users,
        ]);
    }

    public function addStaff(Request $request) {
        $customerUserID = $request->input('customer-id');
        $privilegeStaff = Privilege::select('id')->where('name', 'staff')->first();

        User::find($customerUserID)->update([
            'privilege_id' => $privilegeStaff->id,
        ]);

        return redirect(route('users.admin.manager'));
    }

    public function removeStaff(Request $request) {
        $staffUserID = $request->input('staff-id');
        $privilegeCustomer = Privilege::select('id')->where('name', 'customer')->first();

        User::find($staffUserID)->update([
            'privilege_id' => $privilegeCustomer->id,
        ]);

        return redirect(route('users.admin.manager'));
    }

    public function removeBlackUser(Request $request) {
        $blackUserID = $request->input('black-user-id');

        BlackHistory::where('user_id', $blackUserID)->delete();

        return redirect(route('users.admin.manager'));
    }

    public function adminDashboard() {
        Gate::authorize('visit-admin-dashboard-page');

        $privilegeStudent = Privilege::select('id')->where('name', 'student')->first();
        $privilegeStaff = Privilege::select('id')->where('name', 'customer')->first();
        $privilegeAdmin = Privilege::select('id')->where('name', 'admin')->first();

        $studentNum = User::where('privilege_id', $privilegeStudent->id)->get()->count();
        $staffNum = User::where('privilege_id', $privilegeStaff->id)->get()->count();
        $adminNum = User::where('privilege_id', $privilegeAdmin->id)->get()->count();

        $blackUserNum = BlackHistory::selectRaw('user_id')
            ->groupBy('user_id')
            ->having(DB::raw('count(*)'), '>', 3)
            ->get()->count();

        $computersNum = Computer::count();
        $rentingComputersNum = Lease::whereNull('return_time')->count();

        return view('manager.admin-dashboard', [
            'studentNum' => $studentNum,
            'staffNum' => $staffNum,
            'adminNum' => $adminNum,
            'blackUserNum' => $blackUserNum,
            'computersNum' => $computersNum,
            'rentingComputersNum' => $rentingComputersNum,
        ]);
    }
}
