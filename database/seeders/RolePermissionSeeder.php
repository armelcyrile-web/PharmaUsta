<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'gerer-ressources',
            'gerer-referentiels',
            'gerer-utilisateurs',
            'gerer-roles',
            'gerer-actualites',
            'voir-statistiques',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roleModerateur = Role::firstOrCreate(['name' => 'Modérateur ressources']);
        $roleModerateur->syncPermissions(['gerer-ressources']);

        $roleGestionnaire = Role::firstOrCreate(['name' => 'Gestionnaire pédagogique']);
        $roleGestionnaire->syncPermissions(['gerer-ressources', 'gerer-referentiels']);
    }
}
