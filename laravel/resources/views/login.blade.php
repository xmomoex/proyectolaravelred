@extends('layouts.app')
<main class="container align-center p-5">
    <form action="{{route('inicio-sesion')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" name="email" required>
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
            <label for="rememberCheck" class="form-check-label">Mantener sesión iniciada</label>
        </div>
        <div>
            <p>¿No tienes cuenta? <a href="{{route('registro')}}">
                    Registrate
                </a></p>
        </div>
        <button type="submit" class="btn btn-primary">Acceder</button>
    </form>
</main>