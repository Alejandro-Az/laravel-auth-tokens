<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div>
        <h1>{{ $user->name }}</h1>
        <h2>{{ $user->email }}</h2>
        <h3>{{ $user->role->name }}</h3>

        <br><br>
        <a href="{{ route('logout') }}">Cerrar sesión</a>

    </div>
</body>
</html>
