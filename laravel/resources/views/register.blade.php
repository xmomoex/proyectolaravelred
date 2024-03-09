@extends('layouts.app')
<main class="container align-center p-5">
    <form action="{{route('validar-registro')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" name="email" required autocomplete="disable">
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password" required>
        </div>
        <div class="mb-3">
            <label for="userInput" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="userInput" name="name" required autocomplete="disable">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</main>