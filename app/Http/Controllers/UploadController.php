<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function getfile($path){
        $file=Storage::disk('public')->get('crmdocs/'.$path);
        return Storage::download('public/crmdocs/'.$path);

        return (new Response($file, 200))->header('Content-Type', 'application/pdf');
    }
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
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function uploads(Request $request)
    {

        $client_id=$request->input('client_id');
        $affaire_id=$request->input('affaire_id');
        $path = $request->file('fileToUpload')->storeAs('public/crmdocs',$client_id);

        $path =explode('/',$path);
        $upload = new Upload();
        $upload->titre=$request->input('titre');
        $upload->client_id=$client_id;
        $upload->affaire_id=$affaire_id;
        $upload->path=$path[sizeof($path)-1];
        $upload->save();

        return redirect('/client/c-'.$request->input('client_id'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
