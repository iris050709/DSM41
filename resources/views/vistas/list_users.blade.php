@extends('layouts.app')
@section('title', 'Listado de usuarios')
@section('styles')
    <link rel="stylesheet" href="hola.css">
@endsection
@section('content')
    <h1>USER LIST</h1>
<table class="table table-striped">
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name }} </td>
            <td>
                <a href="{{ route('user.update', $usuario->id) }}" class="btn btn-primary">EDIT</a>
            </td>
            <td>
                <a href="{{ route('user.destroy', $usuario->id) }}" class="btn btn-danger">DELETE</a>
            </td>
        <tr>
    <!--<i class="bi bi-2-square-fill"></i>-->
    @endforeach
</table>
    {{ $usuarios->links('pagination::bootstrap-4') }}
@endsection