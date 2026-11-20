<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenis = [
            [
                'nombre' => 'Nike Air Max 90',
                'marca' => 'Nike',
                'categoria' => 'Lifestyle',
                'descripcion' => 'El clasico con la burbuja de aire en el talon.',
                'precio' => 1150.00,
                'stock' => 18,
                'imagen' => 'air-max-90.jpg',
            ],
            [
                'nombre' => 'Nike Air Max Plus',
                'marca' => 'Nike',
                'categoria' => 'Running',
                'descripcion' => 'Tenis para correr con lineas onduladas.',
                'precio' => 1450.00,
                'stock' => 10,
                'imagen' => 'air-max-plus.jpg',
            ],
            [
                'nombre' => 'Nike Air Max 95 Big Bubble',
                'marca' => 'Nike',
                'categoria' => 'Running',
                'descripcion' => 'Diseño inspirado en el cuerpo humano.',
                'precio' => 1550.00,
                'stock' => 8,
                'imagen' => 'air-max-95.jpg',
            ],
            [
                'nombre' => 'Nike Air Max 270 Premium',
                'marca' => 'Nike',
                'categoria' => 'Lifestyle',
                'descripcion' => 'La burbuja de aire mas alta de Nike.',
                'precio' => 1350.00,
                'stock' => 12,
                'imagen' => 'air-max-270.jpg',
            ],
            [
                'nombre' => 'Nike Air Max',
                'marca' => 'Nike',
                'categoria' => 'Running',
                'descripcion' => 'Tenis para correr y realizar actividades deportivas.',
                'precio' => 1200.00,
                'stock' => 20,
                'imagen' => 'Airmax2.jpg',
            ],
            [
                'nombre' => 'Nike Dunk Low',
                'marca' => 'Nike',
                'categoria' => 'Lifestyle',
                'descripcion' => 'Tenis de uso casual para todos los dias.',
                'precio' => 950.00,
                'stock' => 25,
                'imagen' => 'NikeDunkLow.jpeg',
            ],
        ];

        foreach ($tenis as $t) {
            Producto::updateOrCreate(['nombre' => $t['nombre']], $t);
        }
    }
}
