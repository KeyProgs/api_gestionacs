<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContratController extends Controller
{
    /**
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
    public function create(Request $request)
    {
        $contrat=new Contrat();
        $contrat->client_id=$request->input('client_id')?$request->input('client_id') : 25;
        $contrat->templatecontrat_id=$request->input('templatecontrat_id')?$request->input('templatecontrat_id') : 1;;
        $contrat->compagnie=$request->input('compagnie');
        $contrat->nomcontrat=$request->input('nomcontrat');
        $contrat->numerocontrat=$request->input('numerocontrat');
        $contrat->jourprelevement=$request->input('jourprelevement');
        $contrat->montant=$request->input('montant');
        $contrat->dateeffet=$request->input('dateeffet');
        $contrat->status=$request->input('status');
        $contrat->BIC=$request->input('BIC');
        $contrat->IBAN=$request->input('IBAN');
        $contrat->note=$request->input('note');
        $contrat->save();
        Session::flash('success', 'Contrat mise à jour avec success.');

        return redirect()->back();




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
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function show(Contrat $contrat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrat $contrat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrat $contrat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contrat  $contrat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrat $contrat)
    {
        //
    }
}
