@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Update USER</h3>
    <form action="{{route('user.update.data')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$usuario->id}}">
        <div class="from-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{ $usuario->name }}" id="">
        </div>
        <div class="from-group">
            <input type="submit" value="ENVIO">
        </div>
    </form>
    </div>
@endsection