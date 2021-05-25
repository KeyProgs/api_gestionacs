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

        $total=new DateTime('00:00');
        $total_bkp = clone $total;

        foreach ($dayPointeuses as $dayPointeuse) {

            //if enter action made 1   Keep $hourIn
            if ($dayPointeuse->action == 1)
                $hourIn = new DateTime($dayPointeuse->created_at);

            //if Out action made 0   Make diference frome last $hourIn
            if ($dayPointeuse->action == 0) {

                $hourOut = new DateTime($dayPointeuse->created_at);

                //if not first Pointage in DB
                if ($hourIn <> null) {
                    $diff = $hourOut->diff($hourIn);
                    $diff = $hourIn->diff($hourOut);

                    $block = [];
                    $block['hourIn'] = $hourIn->format('H:i:s');
                    $block['hourOut'] = $hourOut->format('H:i:s');
                    $block['diff'] = $diff->format('%h hr, %i min  %s');


                    $total=$total->add($diff);
//                    dd($total->diff($total_bkp)->format('%h hr, %i min  %s'));

//                    echo "add  total diff".$total->format('H:i:s') . " + " . $diff->format('%H:%i:%s') .'<br>';
                    $block['total'] = $total->diff($total_bkp)->format('%h hr, %i min  %s');





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
//echo($total->format('h:i:s'));
        $total=new DateTime('00:00');
        return $blocks;
    }

    public function dayHoursAuto($dayPointeuse)
    {
        $dayPointeuses = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse  )
            ->get();

        $total=new DateTime('00:00');
        $total_bkp = clone $total;
        foreach ($dayPointeuses as $dayPointeuse) {
            //if enter action made 1   Keep $hourIn
            if ($dayPointeuse->action == 1)
                $hourIn = new DateTime($dayPointeuse->created_at);

            //if Out action made 0   Make diference frome last $hourIn
            if ($dayPointeuse->action == 0) {
                $hourOut = new DateTime($dayPointeuse->created_at);
                //if not first Pointage in DB
                if ($hourIn <> null) {
                    $diff = $hourOut->diff($hourIn);
                    $diff = $hourIn->diff($hourOut);
                    $total=$total->add($diff);
                }
            }
        }

        return $total->diff($total_bkp)->format('%h hr, %i min  %s');

    }

    public function heuresvalides($dayPointeuse)
    {

        $pointeuses = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->first();
        return $pointeuses <>null ? $pointeuses->heuresvalides : 0;
    }

    public function getNote($dayPointeuse)
    {

        $pointeuses = $this::where('user_id', $this->user_id)
            ->whereDay('created_at', $dayPointeuse)
            ->first();
        return $pointeuses <>null ? $pointeuses->note : '//';
    }

    public function getUserPointeusesByMonth($user_id, $mois)
    {
        return $this::where('user_id', $user_id)
            ->whereMonth('created_at', $mois)
            ->get();
    }

    public function actions($monthPointeuse,$dayPointeuse,$user_id){
        $actions= DB::table('actions')
            ->whereDay('dd', $dayPointeuse)
            ->whereMonth('df', $monthPointeuse)
            ->whereDay('dd', $dayPointeuse)
            ->whereMonth('df', $monthPointeuse)
            ->where('responsable', $user_id)
            ->get();

//        dd($actions);
        return $actions;

    }
}
