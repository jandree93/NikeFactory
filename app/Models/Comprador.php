<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $table = 'compradores';

    protected $fillable = [
        'user_id',
        'producto_id',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'departamento',
        'talla',
        'estilo',
        'presupuesto',
        'metodo_contacto',
        'comentarios',
        'estado',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
