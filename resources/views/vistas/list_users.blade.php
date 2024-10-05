@extends('layouts.app')
@section('title', 'Listado de usuarios')
@section('styles')
    <link rel="stylesheet" href="hola.css">
@endsection
@section('content')
    <h1>USER LIST</h1>
    <ul>
    @foreach($usuarios as $usuario)
    <!--<i class="bi bi-2-square-fill"></i>--><li>{{ $usuario->name }} </li>
    @endforeach
    {{ $usuarios->links('pagination::bootstrap-4') }}
    </ul>
@endsection