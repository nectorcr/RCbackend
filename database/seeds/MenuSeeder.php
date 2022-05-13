<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Rol;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('menus')->truncate();
        DB::table('menus')->insert(
            [
                0 => ['id' => '1', 'label' => 'Usuarios', 'route' => 'usuarios.index', 'role_id' => '1', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'label' => 'Roles', 'route' => 'roles.index', 'role_id' => '1', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'label' => 'Archivos', 'route' => 'filesadmin.index', 'role_id' => '1', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                3 => ['id' => '4', 'label' => 'Archivos', 'route' => 'files.index', 'role_id' => '2', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
