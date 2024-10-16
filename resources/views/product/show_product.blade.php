@extends('layouts.app')

@section('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Helvetica Neue', Arial, sans-serif;
        margin: 0;
        padding: 20px;
        font-size: 1rem;
    }

    .container {
        max-width: 700px;
        margin: auto;
        padding: 20px;
    }

    h1 {
        color: #343a40;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
        font-size: 5rem;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s;
        border: none;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #6f42c1;
        color: white;
        padding: 15px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .card-body {
        padding: 20px;
    }

    .card-text {
        font-size: 1.25rem;
        margin-bottom: 15px;
        color: #495057;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #6f42c1;
        border: none;
        transition: background-color 0.3s;
        padding: 12px 25px;
        font-size: 1.5rem;
        border-radius: 5px;
        display: inline-block;
        text-align: center;
        color: white;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #5a32a1;
    }

    .text-muted {
        color: #868e96;
        font-size: 0.9rem;
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
