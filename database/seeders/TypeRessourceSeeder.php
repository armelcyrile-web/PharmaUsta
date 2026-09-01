<?php

namespace Database\Seeders;

use App\Models\TypeRessource;
use Illuminate\Database\Seeder;

class TypeRessourceSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Cours',
            'Anciens sujets d\'examens',
            'Exposés',
            'Documents complémentaires',
        ];

        foreach ($types as $nom) {
            TypeRessource::create(['nom' => $nom]);
        }
    }
}
