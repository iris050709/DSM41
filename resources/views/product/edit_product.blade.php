@extends('layouts.app')
@section('title', 'Editar producto')
@section('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        font-size: 1.1rem;
    }
    h1 {
        color: #6f42c1;
        text-align: center;
        margin: 20px 0;
        font-size: 2.5rem;
    }
    .page-title {
        color: #6f42c1;
        text-align: center;
        margin: 20px 0;
        font-size: 2.5rem;
        font-weight: bold;
    }
    .form-container {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        transition: transform 0.3s;
    }
    .form-container:hover {
        transform: translateY(-5px);
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #495057;
        font-size: 1.2rem;
    }
    input[type="text"],
    input[type="number"],
    textarea {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
        margin: 0 auto;
        display: block;
    }
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus {
        border-color: #6f42c1;
        outline: none;
        box-shadow: 0 0 5px rgba(111, 66, 193, 0.5);
    }
    textarea {
        resize: vertical;
        height: 80px;
    }
    input[type="submit"] {
        background-color: #6f42c1;
        color: #ffffff;
        border: none;
        padding: 12px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 1.3rem;
        transition: background-color 0.3s, transform 0.2s;
        font-weight: bold;
    }
    .btn {
        background-color: #6f42c1;
        color: #ffffff;
        border: none;
        padding: 12px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 1.3rem;
        transition: background-color 0.3s, transform 0.2s;
    }
    .btn:hover {
        background-color: #5a32a1;
        transform: translateY(-2px);
    }
    input[type="submit"]:hover {
        background-color: #5a32a1;
        transform: translateY(-2px);
    }
    .error {
        color: #dc3545;
        margin-bottom: 15px;
        font-weight: bold;
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
            <a href="{{ route('products.list') }}" class="btn btn-primary"><strong>Volver a la lista</strong></a>
        </form>
    </div>
@endsection
