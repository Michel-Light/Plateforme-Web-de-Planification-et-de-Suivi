<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{   
    use HasFactory;

    public function direction()
    {
        return $this->belongsTo(Direction::class, 'id');
    }
    public function seances()
    {
        return $this->belongsToMany(Seance::class, 'participations')
                    ->withPivot('Role_participant', 'Presence');
    }
}
