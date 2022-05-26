<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Wines;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index() {
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
        Computer::find($toDelPCID)->delete();
        return json_encode("delete success");
    }

}
