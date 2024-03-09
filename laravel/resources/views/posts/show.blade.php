@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->titulo }}</h1>
    <img src="{{ asset('images/' . $post->imagen) }}" alt="Imagen" width="400">
    <p>{{ $post->comentario }}</p>
    <p><strong>Creado:</strong> {{ $post->created_at }}</p>
    <p><strong>Actualizado:</strong> {{ $post->updated_at }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection