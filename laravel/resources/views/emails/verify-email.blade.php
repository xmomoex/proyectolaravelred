@component('mail::message')
# Verify Email

Hola {{ $user->name }},

Por favor haz clic en el siguiente botón para verificar tu dirección de correo electrónico:

@component('mail::button', ['url' => route('verification.verify', $user->verification_token)])
Verificar Email
@endcomponent

Gracias,
{{ config('app.name') }}
@endcomponent