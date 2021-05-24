<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraction extends Model
{
    use HasFactory;

    public function sanctions()
    {
        return $this->belongsToMany(Sanction::class, 'sanction_infractions', null, null, null, null, null);
    }

}
