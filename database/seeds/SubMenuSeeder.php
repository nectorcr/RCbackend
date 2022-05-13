<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('submenus')->truncate();
        DB::table('submenus')->insert(
            [
                0 => ['id' => '1', 'label' => 'Archivos Historicos', 'route' => 'filesadmin.index', 'menu_id' => '3', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                1 => ['id' => '2', 'label' => 'Subir Archivos', 'route' => 'filesadmin.create', 'menu_id' => '3', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                2 => ['id' => '3', 'label' => 'Archivos Historicos', 'route' => 'usuarios.index', 'menu_id' => '4', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
                3 => ['id' => '4', 'label' => 'Subir Archivos', 'route' => 'usuarios.create', 'menu_id' => '4', 'is_active' => '1', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }
}
