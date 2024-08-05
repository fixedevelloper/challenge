<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    public function rubrique_candidat()
    {
        return $this->belongsTo(RubriqueCandidat::class,'rubrique_candidat_id','id');
    }
}
