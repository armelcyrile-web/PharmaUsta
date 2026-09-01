<?php

namespace Database\Seeders;

use App\Models\AnneeAcademique;
use App\Models\MatriculeValide;
use Illuminate\Database\Seeder;

class MatriculeValideSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère ou crée l'année académique sans risquer d'erreur de doublon
        $annee = AnneeAcademique::firstOrCreate(['libelle' => '2026-2027']);

        for ($i = 1; $i <= 10; $i++) {
            $matricule = sprintf('USTA-2026-%04d', $i);

            // Ne l'insère que s'il n'existe pas déjà en base
            MatriculeValide::firstOrCreate(
                ['matricule' => $matricule],
                ['annee_academique_id' => $annee->id]
            );
        }
    }
}
