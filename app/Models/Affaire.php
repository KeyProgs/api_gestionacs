<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;



    public function uploads()
    {
//        return $this->belongsToMany(Sanction::class,'sanction_infractions','sanction_id','id');
        return $this->hasMany(Upload::class)->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function client()
    {

        return $this->belongsTo(Client::class);
    }


}
