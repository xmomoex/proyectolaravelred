<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $post->titulo }}" required>
    </div>

    <div class="form-group">
        <label for="comentario">Comentario:</label>
        <textarea class="form-control" id="comentario" name="comentario" rows="4" required>{{ $post->comentario }}</textarea>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" class="form-control-file" id="imagen" name="imagen">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>