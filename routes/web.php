<?php

use App\Http\Controllers\CompradorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Models\Comprador;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $productos = Producto::all();
    return view('welcome', compact('productos'));
});

Route::get('/dashboard', function () {
    $usuario = Auth::user();

    if ($usuario->role == 'comprador') {
        $solicitudes = Comprador::where('user_id', $usuario->id)->latest()->get();
        return view('dashboard', compact('solicitudes'));
    }

    $totalCompradores = Comprador::count();
    $nuevos = Comprador::where('estado', 'nuevo')->count();
    $totalProductos = Producto::count();
    $ultimos = Comprador::latest()->take(5)->get();

    return view('dashboard', compact('totalCompradores', 'nuevos', 'totalProductos', 'ultimos'));
})->middleware(['auth'])->name('dashboard');

Route::get('/quiero-comprar', [CompradorController::class, 'create'])->name('compradores.create');
Route::post('/quiero-comprar', [CompradorController::class, 'store'])->name('compradores.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin,vendedor'])->group(function () {
    Route::get('/compradores', [CompradorController::class, 'index'])->name('compradores.index');
    Route::get('/compradores/{comprador}/edit', [CompradorController::class, 'edit'])->name('compradores.edit');
    Route::put('/compradores/{comprador}', [CompradorController::class, 'update'])->name('compradores.update');

    Route::resource('productos', ProductoController::class)->only(['index', 'create', 'store']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/compradores/{comprador}', [CompradorController::class, 'destroy'])->name('compradores.destroy');

    Route::resource('productos', ProductoController::class)->only(['edit', 'update', 'destroy']);
});

require __DIR__.'/auth.php';
