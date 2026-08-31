<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'niveau_id',
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function ecues()
    {
        return $this->hasMany(Ecue::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
