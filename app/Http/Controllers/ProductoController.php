<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::query()
            ->when($request->consulta, function ($query, $consulta) {
                $query->where(function ($q) use ($consulta) {
                    $q->where('nombre', 'like', "%$consulta%")
                        ->orWhere('marca', 'like', "%$consulta%")
                        ->orWhere('categoria', 'like', "%$consulta%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'marca' => 'required|max:255',
            'categoria' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|max:255',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'marca' => 'required|max:255',
            'categoria' => 'required',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|max:255',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado');
    }
}
