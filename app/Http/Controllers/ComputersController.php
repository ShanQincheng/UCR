<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
    public function index()
    {
        $computers = Computer::all();

        return view('home', [
            'computers' => $computers,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $brand = $request->get('brand', null);
        switch($brand) {
            case null:
                $computers = Computer::all();
                break;
            default:
                $computers = Computer::where('brand', 'like', '%'.$brand.'%')->get();
                break;
        }

        return view('rental', [
            'computers' => $computers,
        ]);
    }

    public function detail(Request $request)
    {
        $computerID = $request->get('id', null);
        if ($computerID == null) {
            $computers = Computer::all();

            return view('rental', [
                'computers' => $computers,
            ]);
        }

        $pc = Computer::where('id', $computerID)->get();
        return view('rental', [
            'pc-detail' => $pc,
        ]);
    }

    public function edit(Computer $computer)
    {
        //
    }

    public function update(Request $request, Computer $computer)
    {
        //
    }

    public function destroy(Computer $computer)
    {
        //
    }
}
