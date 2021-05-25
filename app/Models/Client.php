<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
//    protected $fillable = ['id','nom']; //<---- Add this line
    protected $guarded = [];

    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploads()
    {
//        return $this->belongsToMany(Sanction::class,'sanction_infractions','sanction_id','id');
        return $this->hasMany(Upload::class);
    }
}
