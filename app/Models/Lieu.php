<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'Code_lieu',
        'Libelle_lieu',
    ];

    public function seances()
    {
        return $this->hasMany(Seance::class, 'id');
    }
}
