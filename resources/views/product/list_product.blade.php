@extends('layouts.app')
@section('title', 'Listado de productos')
@section('styles')
    <link rel="stylesheet" href="hola.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            color: #6f42c1;
            text-align: center;
            margin-bottom: 30px;
        }
        .table-container {
            margin: 0 auto;
            width: 95%;
        }
        .table {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        .table th, .table td {
            text-align: center;
        }
        .table th {
            background-color: #6f42c1;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #6f42c1;
            border: none;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .pagination {
            justify-content: center;
        }
        .pagination .page-link {
            border-radius: 5px;
            margin: 0 5px;
        }
        .pagination .page-item.active .page-link {
            background-color: #6f42c1;
            color: #ffffff;
        }
        .pagination .page-link:hover {
            background-color: #6f42c1;
            color: #ffffff;
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
