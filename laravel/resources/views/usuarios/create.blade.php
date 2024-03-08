<!-- resources/views/usuarios/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Crear Nuevo Usuario</h1>

<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf

    <div>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
    </div>

    <button type="submit">Crear Usuario</button>
</form>
@endsection