<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    public function affaire()
    {
        return $this->belongsTo(Affaire::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }



}
