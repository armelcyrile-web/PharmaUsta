<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function ues()
    {
        return $this->hasMany(Ue::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
