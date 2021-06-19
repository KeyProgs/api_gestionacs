<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    public function client(){
//        dd($this->belongsTo(Client::class));
        return $this->belongsTo(Client::class);
    }
}
