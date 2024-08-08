<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = [
        'Titre',
        'Description',
        'Type',
        'Date',
        'Heure_debut',
        'Heure_fin',
        'Rapport',
        'status_seance',
        'Lien_seance',
    ];

    public function lieu()
    {
        return $this->belongsTo(Lieu::class, 'id');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participations')
                    ->withPivot('Role_participant', 'Presence');
    }
}
