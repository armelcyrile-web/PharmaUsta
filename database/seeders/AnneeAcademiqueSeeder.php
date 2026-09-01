<?php

namespace Database\Seeders;

use App\Models\AnneeAcademique;
use Illuminate\Database\Seeder;

class AnneeAcademiqueSeeder extends Seeder
{
    public function run(): void
    {
        AnneeAcademique::create(['libelle' => '2025-2026']);
        AnneeAcademique::create(['libelle' => '2026-2027']);
    }
}
