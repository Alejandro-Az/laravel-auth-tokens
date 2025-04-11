<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>
<body>
    <form method="POST" action="{{ route('login.web') }}">
        @csrf
        <h2 style="text-align: center">Login</h2>

        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <p style="text-align: center; margin-top: 1rem;">¿No tienes cuenta? <a href="/register">Regístrate</a></p>
        <button type="submit">Ingresar</button>
    </form>
    

</body>
</html>
