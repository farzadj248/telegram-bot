<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view-personel' ,'section' => 'Personel Management']);
        Permission::create(['name' => 'create-personel' ,'section' => 'Personel Management']);
        Permission::create(['name' => 'edit-personel' ,'section' => 'Personel Management']);
        Permission::create(['name' => 'delete-personel' ,'section' => 'Personel Management']);

        Permission::create(['name' => 'permission-management' ,'section' => 'Permission Management']);
        Permission::create(['name' => 'role-management' ,'section' => 'Role Management']);

        Permission::create(['name' => 'view-users' ,'section' => 'User Management']);
        Permission::create(['name' => 'create-users' ,'section' => 'User Management']);
        Permission::create(['name' => 'edit-users' ,'section' => 'User Management']);
        Permission::create(['name' => 'delete-users' ,'section' => 'User Management']);

        Permission::create(['name' => 'view-question' ,'section' => 'Question Management']);
        Permission::create(['name' => 'create-question' ,'section' => 'Question Management']);
        Permission::create(['name' => 'edit-question' ,'section' => 'Question Management']);
        Permission::create(['name' => 'delete-question' ,'section' => 'Question Management']);

        Permission::create(['name' => 'view-category' ,'section' => 'Category Management']);
        Permission::create(['name' => 'create-category' ,'section' => 'Category Management']);
        Permission::create(['name' => 'edit-category' ,'section' => 'Category Management']);
        Permission::create(['name' => 'delete-category' ,'section' => 'Category Management']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        $adminRole->givePermissionTo([
            'view-personel',
            'create-personel',
            'edit-personel',
            'delete-personel',
            'permission-management',
            'role-management',
            'view-users',
            'edit-users',
            'create-users',
            'delete-users',
            'view-question',
            'create-question',
            'edit-question',
            'delete-question',
            'view-category',
            'create-category',
            'edit-category',
            'delete-category'
        ]);

        $editorRole->givePermissionTo([
            'view-question',
            'create-question',
            'edit-question',
            'delete-question',
            'view-category',
            'create-category',
            'edit-category',
            'delete-category'
        ]);

        $user = User::where("id",1)->first();
        $user->assignRole('Admin');
    }
}
