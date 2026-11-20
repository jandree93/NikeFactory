<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@nikefactory.gt'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'vendedor@nikefactory.gt'],
            [
                'name' => 'Vendedor',
                'password' => Hash::make('vendedor123'),
                'role' => 'vendedor',
            ]
        );

        User::updateOrCreate(
            ['email' => 'comprador@nikefactory.gt'],
            [
                'name' => 'Ana Lopez',
                'password' => Hash::make('comprador123'),
                'role' => 'comprador',
            ]
        );
    }
}
