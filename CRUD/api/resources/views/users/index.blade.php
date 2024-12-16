<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuarios</title>
    <!-- Tailwind CSS -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/3/3b/Laptop_Icon_2.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-cyan-400">

    <div class="container mx-auto p-6">
        <!-- Título -->
        <h1 class="text-3xl font-bold text-center mb-6 text-white">Registro de Usuarios</h1>

        <!-- Formulario de Registro -->
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg mb-6 bg-gradient-to-r from-blue-300 to-cyan-300">
            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Primera fila -->
                    <input type="text" name="name" placeholder="Nombre" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <input type="text" name="lastname" placeholder="Apellido" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <!-- Segunda fila -->
                    <input type="text" name="phone" placeholder="Teléfono" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <input type="text" name="address" placeholder="Dirección" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <!-- Tercera fila -->
                    <input type="email" name="email" placeholder="Correo Electrónico" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <input type="password" name="password" placeholder="Contraseña" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <!-- Cuarta fila - Rol ID -->
                    <select name="rol_id" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="" disabled selected>Seleccione un Rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                    <!-- Cuarta fila - Especialidad ID -->
                    <select name="specialty_id" required class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="" disabled selected>Seleccione una Especialidad</option>
                        <option value="1">Cardiología</option>
                        <option value="2">Neurología</option>
                        <option value="3">Pediatría</option>
                    </select>
                </div>
                <button type="submit" class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white py-2 px-4 rounded hover:from-blue-600 hover:to-cyan-600">Registrar Persona</button>
            </form>
        </div>

        <!-- Tabla de Usuarios -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden bg-gradient-to-r from-blue-300 to-cyan-300">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">#</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Nombre</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Apellido</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Teléfono</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Dirección</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Correo</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Rol</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Especialidad</th>
                        <th class="px-5 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-left text-xs font-semibold text-white uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="hover:bg-gradient-to-r from-blue-300 to-cyan-300">
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $loop->iteration }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $user->name }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $user->lastname }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $user->phone }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $user->address }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">{{ $user->email }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">
                            {{ $user->rol_id == 1 ? 'Administrador' : 'Usuario' }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm text-gray-800">
                            @if($user->specialty_id == 1)
                                Cardiología
                            @elseif($user->specialty_id == 2)
                                Neurología
                            @elseif($user->specialty_id == 3)
                                Pediatría
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 text-sm flex space-x-2">
                            <!-- Botones de Acción -->
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-1 px-2 rounded hover:from-yellow-600 hover:to-yellow-700">✏️</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    onclick="return confirm('¿Está seguro de que desea eliminar este registro?');"
                                    class="bg-gradient-to-r from-red-500 to-red-600 text-white py-1 px-2 rounded hover:from-red-600 hover:to-red-700">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>