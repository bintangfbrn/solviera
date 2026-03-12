<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        $permissions = [
            // User Permissions
            ['name' => 'users.view', 'display_name' => 'View Users', 'description' => 'Can view users list'],
            ['name' => 'users.create', 'display_name' => 'Create Users', 'description' => 'Can create new users'],
            ['name' => 'users.edit', 'display_name' => 'Edit Users', 'description' => 'Can edit existing users'],
            ['name' => 'users.delete', 'display_name' => 'Delete Users', 'description' => 'Can delete users'],

            // Role Permissions
            ['name' => 'roles.view', 'display_name' => 'View Roles', 'description' => 'Can view roles list'],
            ['name' => 'roles.create', 'display_name' => 'Create Roles', 'description' => 'Can create new roles'],
            ['name' => 'roles.edit', 'display_name' => 'Edit Roles', 'description' => 'Can edit existing roles'],
            ['name' => 'roles.delete', 'display_name' => 'Delete Roles', 'description' => 'Can delete roles'],

            // Permission Permissions
            ['name' => 'permissions.view', 'display_name' => 'View Permissions', 'description' => 'Can view permissions list'],
            ['name' => 'permissions.create', 'display_name' => 'Create Permissions', 'description' => 'Can create new permissions'],
            ['name' => 'permissions.edit', 'display_name' => 'Edit Permissions', 'description' => 'Can edit existing permissions'],
            ['name' => 'permissions.delete', 'display_name' => 'Delete Permissions', 'description' => 'Can delete permissions'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }

        // Create Roles
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            [
                'display_name' => 'Administrator',
                'description' => 'Full access to all features'
            ]
        );

        $editorRole = Role::firstOrCreate(
            ['name' => 'editor'],
            [
                'display_name' => 'Editor',
                'description' => 'Can manage content and users'
            ]
        );

        $viewerRole = Role::firstOrCreate(
            ['name' => 'viewer'],
            [
                'display_name' => 'Viewer',
                'description' => 'Read-only access'
            ]
        );

        // Assign all permissions to admin role
        $adminRole->permissions()->sync(Permission::all());

        // Assign limited permissions to editor role
        $editorPermissions = Permission::whereIn('name', [
            'users.view',
            'users.create',
            'users.edit',
        ])->get();
        $editorRole->permissions()->sync($editorPermissions);

        // Assign view-only permissions to viewer role
        $viewerPermissions = Permission::whereIn('name', [
            'users.view',
            'roles.view',
            'permissions.view',
        ])->get();
        $viewerRole->permissions()->sync($viewerPermissions);

        // Assign admin role to test user if exists
        $testUser = User::where('email', 'test@example.com')->first();
        if ($testUser) {
            $testUser->roles()->sync([$adminRole->id]);
        }

        $this->command->info('Roles and permissions seeded successfully!');
    }
}
