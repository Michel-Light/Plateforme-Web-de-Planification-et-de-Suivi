<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $fillable = [
        'Code_direction',
        'Nom_direction',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'direction_id');
    }
    
}
