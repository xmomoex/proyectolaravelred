<!-- resources/views/usuarios/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Detalles de Usuario</h1>
<p>Id: {{ $usuario->id }}</p>
<p>Nombre: {{ $usuario->nombre }}</p>
<p>Correo electrónico: {{ $usuario->email }}</p>
<p>Descripcion: {{ $usuario->descripcion }}</p>
@endsection