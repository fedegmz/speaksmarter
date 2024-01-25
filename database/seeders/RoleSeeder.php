<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create roles and permissions
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);
        
        //create crud permissions for users
        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        //permisos para gestionar las lecciones
        $permission_create_lesson = Permission::create(['name' => 'create lessons']);
        $permission_read_lesson = Permission::create(['name' => 'read lessons']);
        $permission_update_lesson = Permission::create(['name' => 'update lessons']);
        $permission_delete_lesson = Permission::create(['name' => 'delete lessons']);
        
        //permisos para gestionar las categorias

        $permission_create_category = Permission::create(['name' => 'create categories']);
        $permission_read_category = Permission::create(['name' => 'read categories']);
        $permission_update_category = Permission::create(['name' => 'update categories']);
        $permission_delete_category = Permission::create(['name' => 'delete categories']);


        //permisos para gestionar los usuarios
        $permission_admin = [$permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role,
                            $permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson,
                            $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category];

        $permission_editor = [$permission_create_lesson, $permission_read_lesson, $permission_update_lesson, $permission_delete_lesson,
                            $permission_create_category, $permission_read_category, $permission_update_category, $permission_delete_category];
        
        //assign permissions to roles
        $role_admin->syncPermissions($permission_admin);
        $role_editor->syncPermissions($permission_editor);

        //asignar permisos uno a uno a los usuarios
        // $role_editor->givePermissionTo($permission_read_lesson);
    }
}
