<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'Code_institution',
        'Nom_institution',
    ];

    public function directions()
    {
        return $this->hasMany(Direction::class, 'institution_id');
    }
}
