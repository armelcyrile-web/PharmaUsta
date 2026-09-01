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
            'voir-statistiques',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roleModerateur = Role::create(['name' => 'Modérateur ressources']);
        $roleModerateur->givePermissionTo('gerer-ressources');

        $roleGestionnaire = Role::create(['name' => 'Gestionnaire pédagogique']);
        $roleGestionnaire->givePermissionTo(['gerer-ressources', 'gerer-referentiels']);
    }
}
