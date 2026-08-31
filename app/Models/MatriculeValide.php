<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculeValide extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'annee_academique_id',
    ];

    public function anneeAcademique()
    {
        return $this->belongsTo(AnneeAcademique::class);
    }
}
