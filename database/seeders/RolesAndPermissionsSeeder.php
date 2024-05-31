<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // permission direction
        Permission::create(['name' => 'add direction']);
        Permission::create(['name' => 'update direction']);
        Permission::create(['name' => 'delete direction']);
        Permission::create(['name' => 'view direction']);
        Permission::create(['name' => 'edit direction']);
        // permission service
        Permission::create(['name' => 'add service']);
        Permission::create(['name' => 'update service']);
        Permission::create(['name' => 'delete service']);
        Permission::create(['name' => 'view service']);
        Permission::create(['name' => 'edit service']);
        // permission user
        Permission::create(['name' => 'add user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'update profile']);
        // permission projet
        Permission::create(['name' => 'add projet']);
        Permission::create(['name' => 'update projet']);
        Permission::create(['name' => 'delete projet']);
        Permission::create(['name' => 'view projet']);
        Permission::create(['name' => 'edit projet']);
        Permission::create(['name' => 'update projet state']);
        // permission tache
        Permission::create(['name' => 'add tache']);
        Permission::create(['name' => 'update tache']);
        Permission::create(['name' => 'delete tache']);
        Permission::create(['name' => 'view tache']);
        Permission::create(['name' => 'edit tache']);
        Permission::create(['name' => 'update tache state']);

        // role user
        $role = Role::create(['name' => 'user'])
                ->givePermissionTo([
                    'view projet',
                    'view tache',
                    'update tache state',
                    'update profile'
                ]);

        // role Admin( Chef de direction )
        $role = Role::create(['name' => 'secretaire'])
                ->givePermissionTo([
                    'update profile',
                    'add tache',
                    'update tache',
                    'delete tache',
                    'view tache',
                    'edit tache',
                    'view projet'
                ]);

        // role Admin( Chef de direction )
        $role = Role::create(['name' => 'manager'])
                ->givePermissionTo([
                    'update profile',
                    'add projet',
                    'update projet',
                    'delete projet',
                    'view projet',
                    'edit projet',
                    'update projet state',
                    'add tache',
                    'update tache',
                    'delete tache',
                    'view tache',
                    'edit tache',
                    'update tache state'
                ]);

        // role Admin
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
