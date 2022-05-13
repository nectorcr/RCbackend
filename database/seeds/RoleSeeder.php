<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(
            [
            'id' => '1',
            'name' => 'adminUser',
            'label' => 'Administrador de usuarios y roles'
            ]
        );

        $role1 = Role::create(
            [
            'id' => '2',
            'name' => 'adminFile',
            'label' => 'Administrador de archivos'
            ]
        );

        $role2 = Role::create([
            'id' => '3',
            'name' => 'cliente',
            'label' => 'Visualizador y editor de archivos'
        ]);
    }
}
