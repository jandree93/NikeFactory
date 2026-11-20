<?php

namespace Database\Seeders;

use App\Models\Comprador;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comprador::updateOrCreate(
            ['correo' => 'comprador@nikefactory.gt'],
            [
                'user_id' => User::where('email', 'comprador@nikefactory.gt')->value('id'),
                'producto_id' => Producto::where('nombre', 'Nike Air Max Plus')->value('id'),
                'nombre' => 'Ana',
                'apellido' => 'Lopez',
                'telefono' => '5555-1234',
                'departamento' => 'Guatemala',
                'talla' => 7.5,
                'estilo' => 'Running',
                'presupuesto' => 'Q1000 - Q1500',
                'metodo_contacto' => 'WhatsApp',
                'comentarios' => 'Busco tenis para correr mi primer medio maraton.',
                'estado' => 'contactado',
            ]
        );

        Comprador::updateOrCreate(
            ['correo' => 'carlos.mendez@gmail.com'],
            [
                'producto_id' => Producto::where('nombre', 'Nike Dunk Low')->value('id'),
                'nombre' => 'Carlos',
                'apellido' => 'Mendez',
                'telefono' => '4123-9876',
                'departamento' => 'Sacatepequez',
                'talla' => 10,
                'estilo' => 'Lifestyle',
                'presupuesto' => 'Q500 - Q1000',
                'metodo_contacto' => 'Correo',
                'estado' => 'nuevo',
            ]
        );

        Comprador::updateOrCreate(
            ['correo' => 'mjperez@gmail.com'],
            [
                'producto_id' => Producto::where('nombre', 'Nike Air Max 270 Premium')->value('id'),
                'nombre' => 'Maria Jose',
                'apellido' => 'Perez',
                'telefono' => '3011-4455',
                'departamento' => 'Quetzaltenango',
                'talla' => 6.5,
                'estilo' => 'Lifestyle',
                'presupuesto' => 'Mas de Q1500',
                'metodo_contacto' => 'Llamada',
                'estado' => 'compro',
            ]
        );
    }
}
