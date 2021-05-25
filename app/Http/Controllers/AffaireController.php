<?php

namespace App\Http\Controllers;

use App\Models\Affaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffaireController extends Controller
{

    public function listing(){
        $affaires=Auth::user()->affaires();
        return view('clients.affaires.affaires',['affaires'=>$affaires]);

    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function show(Affaire $affaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Affaire $affaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affaire $affaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Affaire  $affaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affaire $affaire)
    {
        //
    }
}
