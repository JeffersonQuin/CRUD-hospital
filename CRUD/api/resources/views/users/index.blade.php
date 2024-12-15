<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios - Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Registrar Usuario</h1>

        <!-- Mensajes de éxito o error -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-500 text-white p-4 mb-6 rounded">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario de Registro -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf <!-- Agrega esto para proteger el formulario contra ataques CSRF -->

                <input type="text" name="name" placeholder="Nombre" required>
                <input type="text" name="lastname" placeholder="Apellido" required>
                <input type="text" name="phone" placeholder="Teléfono" required>
                <input type="text" name="address" placeholder="Dirección" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="text" name="rol_id" placeholder="ID del Rol" required>
                <input type="text" name="specialty_id" placeholder="ID de Especialidad" required>

                <button type="submit">Crear Usuario</button>
            </form>
        </div>

        <!-- Lista de Usuarios -->
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-center mb-4">Lista de Usuarios</h2>
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                            <th class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase">Nombre</th>
                            <th class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase">Correo</th>
                            <th class="px-5 py-3 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-5 py-2 border-b border-gray-200 text-sm">{{ $user->id }}</td>
                                <td class="px-5 py-2 border-b border-gray-200 text-sm">{{ $user->name }} {{ $user->lastname }}</td>
                                <td class="px-5 py-2 border-b border-gray-200 text-sm">{{ $user->email }}</td>
                                <td class="px-5 py-2 border-b border-gray-200 text-sm">
                                    <!-- Enlace a Ver detalles -->
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-800">Ver</a> |
                                    
                                    <!-- Enlace a Editar -->
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-600 hover:text-yellow-800">Editar</a> |
                                    
                                    <!-- Formulario para Eliminar -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>