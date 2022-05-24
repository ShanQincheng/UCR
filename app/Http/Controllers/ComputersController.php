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

    public function show(Computer $computer)
    {
        //
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
