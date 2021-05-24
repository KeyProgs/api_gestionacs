<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public function typeaction()
    {
//        return 'typeaction';
        return $this->hasOne(Action_types::class, 'id', 'id_action_type');
    }

    public function getRapporteur()
    {
//        return 'typeaction';
        return $this->hasOne(User::class, 'id', 'rapporteur');
    }

    public function getResponsable()
    {
//        return 'typeaction';
        return $this->hasOne(User::class, 'id', 'responsable');
    }

    public function getActionEtat()
    {
//        return 'typeaction';
        return $this->hasOne(Action_etat::class, 'id', 'id_action_etat');
    }

}
