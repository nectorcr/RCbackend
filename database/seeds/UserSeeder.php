<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminUser = User::create(
            [
                'id' => '1',
                'name' => 'Eduardo Salamanca',
                'email' => 'admin.user@test.com',
                'password' => Hash::make('capital1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        )->assignRole('adminUser');

        $adminFile = User::create(
            [
                'id' => '2',
                'name' => 'Gustavo Fring',
                'email' => 'admin.file@test.com',
                'password' => Hash::make('capital1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        )->assignRole('adminFile');

        $cliente1 = User::create(
            [
                'id' => '3',
                'name' => 'Walter White',
                'email' => 'user1@test.com',
                'password' => Hash::make('capital1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        )->assignRole('cliente');

        $cliente2 = User::create(
            [
                'id' => '4',
                'name' => 'Saul Goodman',
                'email' => 'user2@testmail.com',
                'password' => Hash::make('capital1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        )->assignRole('cliente');

    }
}
