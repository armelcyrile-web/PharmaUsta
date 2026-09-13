<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $table = 'actualites';

    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'type',
        'statut',
        'date_publication',
        'auteur_id',
    ];

    protected $casts = [
        'date_publication' => 'date',
    ];

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }
}
