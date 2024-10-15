@extends('layouts.app')
@section('title', 'Editar producto')
@section('styles')
<style>
    body {
        background-color: #f8f9fa; /* Fondo claro */
        font-family: 'Arial', sans-serif; /* Fuente del texto */
        margin: 0; /* Sin márgenes */
        padding: 0; /* Sin espaciado interno */
        font-size: 1.1rem; /* Tamaño de fuente general aumentado */
    }
    h1 {
        color: #6f42c1; /* Color morado para el título */
        text-align: center;
        margin: 20px 0; /* Espaciado arriba y abajo */
        font-size: 2.5rem; /* Tamaño del texto del título aumentado */
    }
    .page-title {
        color: #6f42c1; /* Color morado para el título */
        text-align: center;
        margin: 20px 0; /* Espaciado arriba y abajo */
        font-size: 2.5rem; /* Tamaño del texto del título aumentado */
        font-weight: bold; /* Negrita para el título */
    }
    .form-container {
        background-color: #ffffff; /* Fondo blanco para el formulario */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15); /* Sombra más prominente */
        max-width: 400px; /* Ancho máximo del formulario */
        margin: 40px auto; /* Centrar el contenedor */
        padding: 20px; /* Espaciado interno */
        transition: transform 0.3s; /* Transición para el efecto hover */
    }
    .form-container:hover {
        transform: translateY(-5px); /* Elevar el formulario al pasar el ratón */
    }
    .form-group {
        margin-bottom: 15px; /* Espaciado entre grupos de formulario */
    }
    label {
        display: block; /* Mostrar label como bloque */
        margin-bottom: 5px; /* Espaciado inferior */
        font-weight: bold; /* Texto en negrita */
        color: #495057; /* Color del texto */
        font-size: 1.2rem; /* Tamaño del texto de las etiquetas aumentado */
    }
    input[type="text"],
    input[type="number"],
    textarea {
        width: calc(100% - 22px); /* Ancho completo menos el padding */
        padding: 10px; /* Espaciado interno */
        border: 1px solid #ced4da; /* Borde gris claro */
        border-radius: 4px; /* Bordes redondeados */
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Sombra interna */
        font-size: 1rem; /* Tamaño del texto en los campos */
        transition: border-color 0.3s, box-shadow 0.3s; /* Transición para el borde y sombra */
        margin: 0 auto; /* Centrar los inputs */
        display: block; /* Forzar a que se comporte como bloque para el centrado */
    }
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        border-color: #6f42c1; /* Cambia el color del borde al foco */
        outline: none; /* Sin contorno al foco */
        box-shadow: 0 0 5px rgba(111, 66, 193, 0.5); /* Sombra al foco */
    }
    textarea {
        resize: vertical; /* Permitir redimensionar solo verticalmente */
        height: 80px; /* Altura inicial del textarea */
    }
    input[type="submit"] {
        background-color: #6f42c1; /* Color morado para el botón */
        color: #ffffff; /* Texto blanco en el botón */
        border: none; /* Sin borde */
        padding: 12px; /* Espaciado interno */
        border-radius: 4px; /* Bordes redondeados */
        cursor: pointer; /* Cursor pointer al pasar por encima */
        width: 100%; /* Ancho completo */
        font-size: 1.3rem; /* Tamaño del texto del botón aumentado */
        transition: background-color 0.3s, transform 0.2s; /* Transiciones suaves */
    }
    input[type="submit"]:hover {
        background-color: #5a32a1; /* Color más oscuro en hover */
        transform: translateY(-2px); /* Efecto de elevación en hover */
    }
    .error {
        color: #dc3545; /* Color rojo para mensajes de error */
        margin-bottom: 15px; /* Espaciado inferior */
        font-weight: bold; /* Texto en negrita para errores */
    }
</style>
@endsection

@section('content')
    <h1 class="page-title">{{ isset($products) ? 'Editar Producto' : 'Crear Nuevo Producto' }}</h1>

    @if ($errors->any())
        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-container">
        <form action="{{ isset($products) ? route('products.update.data') : route('products.store') }}" method="POST">
            @csrf
            @if (isset($products))
                <input type="hidden" name="id" value="{{ $products->id }}">
            @endif
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $products->name ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" required>{{ old('description', $products->description ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $products->price ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $products->stock ?? '') }}" required>
            </div>
            <div class="form-group">
                <input type="submit" value="{{ isset($products) ? 'EDITAR' : 'ENVIAR' }}">
            </div>
        </form>
    </div>
@endsection
