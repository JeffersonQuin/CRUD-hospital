<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido - Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-gray-700 mb-4">¡Bienvenido a Laravel!</h1>

        <p class="text-center text-lg text-gray-600 mb-8">
            Esta es la vista de bienvenida de tu aplicación. Puedes comenzar a crear tus rutas, controladores y vistas aquí.
        </p>

        <div class="flex justify-center">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Ir a la lista de usuarios
            </a>
        </div>
    </div>
</body>
</html>