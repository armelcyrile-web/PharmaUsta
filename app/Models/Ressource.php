<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'fichier',
        'statut',
        'annee_academique_id',
        'niveau_id',
        'ue_id',
        'ecue_id',
        'type_ressource_id',
    ];

    public function anneeAcademique()
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }

    public function ecue()
    {
        return $this->belongsTo(Ecue::class);
    }

    public function typeRessource()
    {
        return $this->belongsTo(TypeRessource::class);
    }
}
