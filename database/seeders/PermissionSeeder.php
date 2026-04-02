<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Create the initial roles and permissions.
         */
        // Reset Cached Permission before Seeding
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'view shipments']);
        Permission::create(['name' => 'manage shipments']);
        Permission::create(['name' => 'view bookings']);
        Permission::create(['name' => 'manage bookings']);

        // Create roles
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $superAdminRole->givePermissionTo(Permission::all());
        $adminRole->givePermissionTo([
            'view dashboard',
            'view shipments',
            'manage shipments',
        ]);
        $userRole->givePermissionTo([
            'view dashboard',
            'view bookings',
            'manage bookings',
        ]);

        // Create a dummy user that also allow bypassing registration step
        $newUserA = User::create([
            'name' => 'SuperAdmin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
        ]);

        $newUserB = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $newUserC = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign roles
        $newUserA->assignRole('super_admin');
        $newUserB->assignRole('admin');
        $newUserC->assignRole('user');
    }
}
