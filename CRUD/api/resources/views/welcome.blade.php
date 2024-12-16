<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido - Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/3/3b/Laptop_Icon_2.png" type="image/png">
</head>
<body class="bg-gradient-to-r from-blue-500 to-green-400">
    <div class="container mx-auto p-12">
        <h1 class="text-5xl font-bold text-center text-white mb-4">PRACTICA</h1>
        <h2 class="text-5xl font-bold text-center text-white mb-4">INF 3741-A (TALLER DE DESARROLLO DE SOFTWARE)</h2>
        <p class="text-2xl text-center text-white mb-8">
            <span class="font-semibold">UNIVERSITARIO: Quiñonez Aguirre Jefferson Gervacio</span>
        </p>
        <div class="flex justify-center">
            <a href="{{ route('users.index') }}" class="px-6 py-3 bg-yellow-500 text-white text-xl font-semibold rounded-lg shadow-lg hover:bg-yellow-600 transition-colors duration-300">
                Ir a la lista de usuarios
            </a>
        </div>
    </div>
</body>
</html>