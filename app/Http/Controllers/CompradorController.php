<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompradorController extends Controller
{
    public function index(Request $request)
    {
        $compradores = Comprador::query()
            ->when($request->consulta, function ($query, $consulta) {
                $query->where(function ($q) use ($consulta) {
                    $q->where('nombre', 'like', "%$consulta%")
                        ->orWhere('apellido', 'like', "%$consulta%")
                        ->orWhere('correo', 'like', "%$consulta%")
                        ->orWhere('telefono', 'like', "%$consulta%");
                });
            })
            ->when($request->estado, function ($query, $estado) {
                $query->where('estado', $estado);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('compradores.index', compact('compradores'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('compradores.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|min:8|max:20',
            'departamento' => 'required',
            'talla' => 'nullable|numeric|between:3,16',
            'producto_id' => 'nullable|exists:productos,id',
            'metodo_contacto' => 'required',
            'comentarios' => 'nullable|max:1000',
        ]);

        $datos = $request->only([
            'nombre', 'apellido', 'correo', 'telefono', 'departamento', 'talla',
            'estilo', 'presupuesto', 'producto_id', 'metodo_contacto', 'comentarios',
        ]);
        $datos['estado'] = 'nuevo';
        $datos['user_id'] = Auth::id();

        Comprador::create($datos);

        return redirect()->route('compradores.create')->with('success', '¡Gracias! Recibimos tus datos, un asesor te va a contactar pronto.');
    }

    public function edit(Comprador $comprador)
    {
        $productos = Producto::all();
        return view('compradores.edit', compact('comprador', 'productos'));
    }

    public function update(Request $request, Comprador $comprador)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|min:8|max:20',
            'departamento' => 'required',
            'talla' => 'nullable|numeric|between:3,16',
            'producto_id' => 'nullable|exists:productos,id',
            'metodo_contacto' => 'required',
            'comentarios' => 'nullable|max:1000',
            'estado' => 'required',
        ]);

        $comprador->update($request->only([
            'nombre', 'apellido', 'correo', 'telefono', 'departamento', 'talla',
            'estilo', 'presupuesto', 'producto_id', 'metodo_contacto', 'comentarios', 'estado',
        ]));

        return redirect()->route('compradores.index')->with('success', 'Comprador actualizado');
    }

    public function destroy(Comprador $comprador)
    {
        $comprador->delete();

        return redirect()->route('compradores.index')->with('success', 'Comprador eliminado');
    }
}
