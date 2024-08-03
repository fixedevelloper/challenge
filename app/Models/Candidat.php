<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public function edition()
    {
        return $this->belongsTo(Edition::class,'edition_id','id');
    }
    public function rubriques()
    {
        return $this->belongsToMany(Rubrique::class,'rubrique_candidats');
    }
}
