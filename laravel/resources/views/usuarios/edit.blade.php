@extends('layouts.app')

@section('content')
<h1>Editar Usuario</h1>
<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $usuario->nombre }}">
    <label for="email">Email:</label>
    <input type="text" name="email" value="{{ $usuario->email }}">
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" value="{{ $usuario->descripcion }}">
    <button type="submit">Actualizar</button>
</form>
@endsection