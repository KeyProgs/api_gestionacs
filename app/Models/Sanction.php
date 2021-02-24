<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sanction extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function infractions()
    {
//        return $this->belongsToMany(Sanction::class,'sanction_infractions','sanction_id','id');
        return $this->belongsToMany(Infraction::class,'sanction_infractions',null,null,null,null,null);
    }

}
