@extends('layouts.app')
<div class="container">
    <header class="d-flex flex-wrap align-items-center
    justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="" class="d-flex align-items-center col-md-3 mb-2 
    mb-md-0 text-dark text-decoration-none">Pagina privada del Usuario</a>

        <div class="col-md-3 text-end">
            <a href="{{route('logout')}}">
                <button type="button" class="btn btn-online-primary me-2">Salir</button>
            </a>
        </div>
    </header>
    <article class="container">
        <h3>Seccion privada</h3>
    </article>
</div>