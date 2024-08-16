<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteOrganisateurs extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom',
        'Prenom',
        'Email',
        'mot_de_passe',
        'Poste',
    ];
}
