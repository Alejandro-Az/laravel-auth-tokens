<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=" {{ asset('css/register.css') }}">
    <title>Registro</title>
</head>
<body>
    <form method="POST" action="{{ route('register.web') }}">
        @csrf
        <h2 style="text-align: center">Registro</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif

        <input type="text" name="name" placeholder="Nombre completo" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
        <button type="submit">Registrarse</button>
        <p style="text-align: center; margin-top: 1rem;">¿Ya tienes cuenta? <a href="/login">Inicia sesión</a></p>
    </form>

</body>
</html>
