@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <section class="intro">
        <h2>Bienvenido a Nike Factory</h2>
        <p>Encuentra tus tenis favoritos y déjanos tus datos para que un vendedor te contacte.</p>
        <a href="{{ route('compradores.create') }}" class="boton">Quiero comprar</a>
    </section>

    <section>
        <h2>Productos</h2>

        <input type="search" id="buscar" class="buscar" placeholder="Buscar por nombre o categoría">

        <div class="productos">
            @forelse ($productos as $producto)
                <div class="producto">
                    @if ($producto->imagen)
                        <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                    @endif
                    <span class="etiqueta">{{ $producto->categoria }}</span>
                    <h3>{{ $producto->nombre }}</h3>
                    <p class="precio">Q{{ $producto->precio }}</p>
                    <a href="{{ route('compradores.create', ['producto' => $producto->id]) }}">Lo quiero</a>
                </div>
            @empty
                <p>No hay productos disponibles.</p>
            @endforelse
        </div>

        <p id="sin-resultados" hidden>No se encontraron productos.</p>
    </section>

    <section>
        <h2>Ubicación</h2>
        <p>Visita nuestra tienda Nike en Cayalá.</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.803703891072!2d-90.4871384385499!3d14.610255326779816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a30049c02709%3A0x30096ec3a444c65c!2sNike%20Store%20Cayala!5e0!3m2!1sen!2sgt!4v1787886918671!5m2!1sen!2sgt" allowfullscreen loading="lazy"></iframe>
    </section>

    <script>
        let buscador = document.getElementById("buscar");
        let productos = document.querySelectorAll(".producto");
        let sinResultados = document.getElementById("sin-resultados");

        buscador.addEventListener("input", function () {
            let texto = buscador.value.toLowerCase();
            let visibles = 0;

            productos.forEach(function (producto) {
                let coincide = producto.textContent.toLowerCase().includes(texto);
                producto.hidden = !coincide;
                if (coincide) {
                    visibles++;
                }
            });

            sinResultados.hidden = visibles > 0 || productos.length == 0;
        });
    </script>
@endsection
