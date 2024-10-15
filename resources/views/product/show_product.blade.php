@extends('layouts.app')

@section('styles')
<style>
    body {
        background-color: #f8f9fa; /* Fondo claro */
        font-family: 'Helvetica Neue', Arial, sans-serif; /* Fuente más formal */
        margin: 0; /* Sin márgenes */
        padding: 20px; /* Espaciado interno */
        font-size: 1rem; /* Tamaño de fuente general */
    }

    .container {
        max-width: 700px; /* Ancho máximo del contenedor */
        margin: auto; /* Centrando el contenedor */
        padding: 20px; /* Espaciado interno del contenedor */
    }

    h1 {
        color: #343a40; /* Color del título */
        font-weight: 700; /* Negrita para el título */
        margin-bottom: 20px; /* Espaciado inferior */
        text-align: center; /* Centrar título */
        font-size: 5rem; /* Tamaño de fuente aumentado para el título */
    }

    .card {
        border-radius: 12px; /* Bordes más redondeados */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15); /* Sombra más prominente */
        transition: transform 0.3s; /* Transición para el efecto hover */
        border: none; /* Sin borde */
        margin-bottom: 20px; /* Espacio entre tarjetas */
    }

    .card:hover {
        transform: translateY(-5px); /* Elevar la tarjeta al pasar el ratón */
    }

    .card-header {
        background-color: #6f42c1; /* Fondo del header de la tarjeta */
        color: white; /* Color del texto */
        padding: 15px; /* Espaciado interno */
        border-top-left-radius: 12px; /* Bordes redondeados superiores */
        border-top-right-radius: 12px; /* Bordes redondeados superiores */
        font-size: 1.5rem; /* Tamaño del título de la tarjeta */
        font-weight: 600; /* Negrita */
    }

    .card-body {
        padding: 20px; /* Espaciado interno del cuerpo de la tarjeta */
    }

    .card-text {
        font-size: 1.25rem; /* Tamaño del texto aumentado */
        margin-bottom: 15px; /* Espaciado entre líneas */
        color: #495057; /* Color del texto */
        font-weight: 500; /* Negrita para el contenido */
    }

    .btn-primary {
        background-color: #6f42c1; /* Color morado para el botón */
        border: none; /* Sin borde */
        transition: background-color 0.3s; /* Transición suave */
        padding: 12px 25px; /* Espaciado del botón */
        font-size: 1.5rem; /* Tamaño de fuente del botón aumentado */
        border-radius: 5px; /* Bordes redondeados del botón */
        display: inline-block; /* Alinear el botón */
        text-align: center; /* Centrar texto del botón */
        color: white; /* Color del texto del botón */
        font-weight: 600; /* Negrita para el texto del botón */
    }

    .btn-primary:hover {
        background-color: #5a32a1; /* Color más oscuro en hover */
    }

    .text-muted {
        color: #868e96; /* Color para texto menos importante */
        font-size: 0.9rem; /* Tamaño de fuente más pequeño */
    }
</style>
@endsection

@section('content')
    <h1>Detalles del Producto</h1>
    <div class="container">
        <div class="card">
            <div class="card-header"><strong>{{ $product->name }}</strong></div>
            <div class="card-body">
                <p class="card-text"><strong>Descripción:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                <a href="{{ route('products.list') }}" class="btn btn-primary"><strong>Volver a la lista</strong></a>
            </div>
        </div>
    </div>
@endsection
