@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Posts</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Añadir Post</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Imagen</th>
                                <th>Comentario</th>
                                <th>Fecha de Creación</th>
                                <th>Fecha de Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->titulo }}</td>
                                <td>
                                    @if($post->imagen)
                                    <img src="{{ asset('images/' . $post->imagen) }}" alt="Imagen" width="100">
                                    @else
                                    Sin imagen
                                    @endif
                                </td>
                                <td>{{ $post->comentario }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Editar</a>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Ver</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection