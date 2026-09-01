<?php

namespace Database\Seeders;

use App\Models\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    public function run(): void
    {
        $niveaux = [
            'L1 Pharmacie',
            'L2 Pharmacie',
            'L3 Pharmacie',
            'M1 Pharmacie',
            'M2 Pharmacie',
        ];

        foreach ($niveaux as $nom) {
            Niveau::create(['nom' => $nom]);
        }
    }
}
