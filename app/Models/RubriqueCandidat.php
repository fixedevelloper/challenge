<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubriqueCandidat extends Model
{
    use HasFactory;
    public function candidat()
    {
        return $this->belongsTo(Candidat::class,'candidat_id','id');
    }
    public function rubrique()
    {
        return $this->belongsTo(Edition::class,'rubrique_id','id');
    }
}
