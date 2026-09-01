<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecue extends Model
{
    use HasFactory;

    protected $table = 'ecues';

    protected $fillable = [
        'nom',
        'ue_id',
    ];

    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressource::class);
    }
}
