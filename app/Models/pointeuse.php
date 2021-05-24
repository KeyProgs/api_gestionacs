<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pointeuse extends Model
{
    use HasFactory;

    public function getLastPointeuse()
    {

        return $this->latest()->first();
    }

    public function dayHours()
    {
        $dayPointeuse = date('d', strtotime($this->created_at));
        $blocks = [];
        $hourIn = null;


        $dayPointeuses = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->get();

        foreach ($dayPointeuses as $dayPointeuse) {

            if ($dayPointeuse->action == 1)
                $hourIn = new DateTime($dayPointeuse->created_at);


            if ($dayPointeuse->action == 0) {

                $hourOut = new DateTime($dayPointeuse->created_at);

                if ($hourIn <> null) {
                    $diff = $hourOut->diff($hourIn);

                    $block = [];
                    $block['hourIn'] = $hourIn->format('H:i:s');
                    $block['hourOut'] = $hourIn->format('H:i:s');
                    $block['diff'] = $diff->format('%h hr, %i min  %s');
                    $block['diff'] = $diff->format('%h hr, %i min  %s');

                    $blocks[] = $block;
                } else {
                    $block = [];
                    $block['hourIn'] = 'introuvable';
                    $block['hourOut'] = $hourIn;
                    $block['diff'] = '?h';
                    $blocks[] = $block;
                }


            }


        }
        return $blocks;
    }

    public function dayHoursAuto($dayPointeuse)
    {
//        $dayPointeuse = date('d', strtotime($this->created_at));


        $firstLogin = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->first();
        if (($firstLogin) == null) return '0';
        $firstLogin = new Carbon($firstLogin->created_at);
        $firstLogin = $firstLogin->toDateTimeString();
        $firstLogin = new DateTime($firstLogin);


        $lastLogin = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->latest()->first();
        if (($lastLogin) == null) return '0';
        $lastLogin = new Carbon($lastLogin->created_at);
        $lastLogin = $lastLogin->toDateTimeString();
        $lastLogin = new DateTime($lastLogin);

        $diff = $lastLogin->diff($firstLogin);
//        dd($diff->format('%h hr, %i min  %s'));
        return $diff->format('%h hr, %i min  %s');


    }

    public function heuresvalides($dayPointeuse)
    {

        $pointeuses = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->first();
        return $pointeuses <>null ? $pointeuses->heuresvalides : 0;
    }

    public function getUserPointeusesByMonth($user_id, $mois)
    {
        return $this::where('user_id', $user_id)
            ->whereMonth('created_at', $mois)
            ->get();
    }

    public function actions($monthPointeuse,$dayPointeuse){
        $actions= DB::table('actions')
            ->whereDay('dd', $dayPointeuse)
            ->whereMonth('df', $monthPointeuse)
            ->whereDay('dd', $dayPointeuse)
            ->whereMonth('df', $monthPointeuse)
            ->where('responsable', Auth::user()->id)
            ->get();

//        dd($actions);
        return $actions;

    }
}
