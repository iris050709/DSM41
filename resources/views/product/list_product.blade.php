@extends('layouts.app')
@section('title', 'Listado de productos')
@section('styles')
    <link rel="stylesheet" href="hola.css">
    <style>
        body {
            background-color: #f8f9fa; /* Fondo claro */
        }
        h1 {
            color: #6f42c1; /* Color morado para el título */
            text-align: center;
            margin-bottom: 30px;
        }
        .table-container {
            margin: 0 auto; /* Centrar el contenedor de la tabla */
            width: 95%; /* Ancho del contenedor */
        }
        .table {
            background-color: #ffffff; /* Fondo blanco para la tabla */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            width: 100%; /* Ancho completo */
        }
        .table th, .table td {
            text-align: center; /* Centrar texto en encabezados y celdas */
        }
        .table th {
            background-color: #6f42c1; /* Encabezados en morado */
            color: #ffffff; /* Texto blanco en encabezados */
        }
        .btn-primary {
            background-color: #6f42c1; /* Botón de crear en morado */
            border: none; /* Sin borde */
        }
        .btn-info {
            background-color: #17a2b8; /* Color info */
        }
        .btn-warning {
            background-color: #ffc107; /* Color de advertencia */
        }
        .btn-danger {
            background-color: #dc3545; /* Color peligro */
        }
        .btn:hover {
            opacity: 0.8; /* Efecto hover */
        }
        .pagination {
            justify-content: center; /* Centrar la paginación */
        }
        .pagination .page-link {
            border-radius: 5px; /* Bordes redondeados */
            margin: 0 5px; /* Espaciado entre botones */
        }
        .pagination .page-item.active .page-link {
            background-color: #6f42c1; /* Fondo morado para el botón activo */
            color: #ffffff; /* Texto blanco para el botón activo */
        }
        .pagination .page-link:hover {
            background-color: #6f42c1; /* Efecto hover en los enlaces */
            color: #ffffff; /* Texto blanco en hover */
        }
    </style>
@endsection

@section('content')
@include('sweetalert::alert')
    <h1>Lista de Productos</h1>
    <div class="text-center mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Producto</a><br>
    </div>
    <br>
    <div class="container table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Mostrar</a>
                            <a href="{{ route('products.update', $product->id) }}" class="btn btn-warning">Editar</a>
                            <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            <div class="text-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
