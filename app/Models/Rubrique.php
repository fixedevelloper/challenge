<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrique extends Model
{
    use HasFactory;
    public function candidats()
    {
        return $this->belongsToMany(Candidat::class,'rubrique_candidats');
    }
}
