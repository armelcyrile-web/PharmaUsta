<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AnneeAcademiqueSeeder::class,
            NiveauSeeder::class,
            UeEcueSeeder::class,
            TypeRessourceSeeder::class,
            MatriculeValideSeeder::class,
            RolePermissionSeeder::class,
            AdminPrincipalSeeder::class,
        ]);
    }
}
