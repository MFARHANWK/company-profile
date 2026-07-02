<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero section',
        ];

        foreach($permissions as $permissions){
            Permission::firstOrCreate(
                [
                    'name' => $permissions
                ]
            );
        }

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'farhan',
            'email' => 'mfarhanwk@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $user->assignRole($superAdminRole);
    }
}
