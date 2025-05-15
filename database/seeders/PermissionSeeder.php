<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $permissions = [
            // Property permissions
            'property-view',
            'property-create',
            'property-edit',
            'property-delete',

            // Contact permissions
            'contact-view',
            'contact-create',
            'contact-delete',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Retrieve roles 
        $superAdmin = Role::findByName('super-admin');
        $buyer = Role::findByName('buyer');
        $seller = Role::findByName('seller');

        // Super admin gets all permissions
        $superAdmin->syncPermissions(Permission::all());

        $buyer->syncPermissions([
            'property-view',
            'contact-view',
        ]);

        $seller->syncPermissions([
            'property-view',
            'property-create',
            'property-edit',
            'property-delete',
            'contact-view',
        ]);
    }
}
