<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:255',
            'overview' => 'required',
            'price' => 'required|numeric'
        ]);

        auth()->user()->files()->create([
            'title' => $request->get('title'),
            'overview' => $request->get('overview'),
            'price' => $request->get('price')
        ]);

        return back()->with('message', 'Your file is submitted Successfully');
    }

    public function upload()
    {
        return 'x';
    }




}
