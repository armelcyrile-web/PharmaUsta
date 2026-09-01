<?php

namespace Database\Seeders;

use App\Models\Niveau;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminPrincipalSeeder extends Seeder
{
    public function run(): void
    {
        $niveau = Niveau::first();

        $admin = User::firstOrCreate(
            ['email' => 'admin@pharmausta.bj'],
            [
                'nom' => 'Admin',
                'prenom' => 'Principal',
                'password' => Hash::make('ChangeMoi123!'),
                'matricule' => 'ADMIN',
                'niveau_id' => $niveau->id,
            ]
        );

        $admin->givePermissionTo(Permission::all());
    }
}
