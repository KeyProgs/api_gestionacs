<?php

namespace App\Http\Controllers;

use App\Models\pointeuse;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointeuseController extends Controller
{

    public function validations(Request $request)
    {

        $mois = $request->input('mois');
        $user_id = $request->input('user');
        $pointeuses = pointeuse::where('user_id', $user_id)
            ->whereMonth('created_at', $mois)
            ->get();
        $users=User ::all();
        $pointer=new pointeuse();
//        dd($pointeuses);
        return view('users.pointeuse.validations',['pointeuses'=>$pointeuses,'users'=>$users,'user_id'=>$user_id,'mois_id'=>$mois,'pointer'=>$pointer]);

    }

    public function setValidations(Request $request){

        for($day=1;$day<32;$day++){
//            echo "$day ".$request->input('mois')." //".$request->input('dayValideHours_'.$day)." 000<br>";
            $data = DB::table('pointeuses')
                ->whereDay('created_at', $day)
                ->whereMonth('created_at', $request->input('mois'))
                ->update([
                    'heuresvalides' =>$request->input('dayValideHours_'.$day),
                    'note' =>$request->input('note_'.$day)
                ]);
        }
        $mois = $request->input('mois');
        $user_id = $request->input('user');
        $pointeuses = pointeuse::where('user_id', $user_id)
            ->whereMonth('created_at', $mois)
            ->get();
        $users=User ::all();
        $pointer=new pointeuse();
//        dd($pointeuses);
        return view('users.pointeuse.validations',['pointeuses'=>$pointeuses,'users'=>$users,'user_id'=>$user_id,'mois_id'=>$mois,'pointer'=>$pointer]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
//        dd('ok');
        $pointeuse = new Pointeuse();
        $pointeuse->action = $request->input('action');
        $pointeuse->user_id = Auth::user()->id;
        echo 'hoo';
        return $pointeuse->save() ? true : false;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param pointeuse $pointeuse
     * @return Response
     */
    public function show(pointeuse $pointeuse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param pointeuse $pointeuse
     * @return Response
     */
    public function edit(pointeuse $pointeuse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param pointeuse $pointeuse
     * @return Response
     */
    public function update(Request $request, pointeuse $pointeuse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param pointeuse $pointeuse
     * @return Response
     */
    public function destroy(pointeuse $pointeuse)
    {
        //
    }
}
