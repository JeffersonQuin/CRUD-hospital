<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
    <!-- Tailwind CSS -->
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/3/3b/Laptop_Icon_2.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-cyan-400">

    <div class="container mx-auto p-6">
        <!-- Título -->
        <h1 class="text-3xl font-bold text-center mb-6 text-white">Editar Usuario</h1>

        <!-- Formulario de Edición -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg bg-gradient-to-r from-blue-300 to-cyan-300">
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Apellido -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Dirección -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dirección</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Correo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Contraseña (opcional)</label>
                    <input type="password" name="password" placeholder="Dejar en blanco si no desea cambiarla" 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>

                <!-- Rol -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Rol</label>
                    <select name="rol_id" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="1" {{ $user->rol_id == 1 ? 'selected' : '' }}>Administrador</option>
                        <option value="2" {{ $user->rol_id == 2 ? 'selected' : '' }}>Usuario</option>
                    </select>
                </div>

                <!-- Especialidad -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Especialidad</label>
                    <select name="specialty_id" required 
                        class="border p-2 rounded w-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="1" {{ $user->specialty_id == 1 ? 'selected' : '' }}>Cardiología</option>
                        <option value="2" {{ $user->specialty_id == 2 ? 'selected' : '' }}>Neurología</option>
                        <option value="3" {{ $user->specialty_id == 3 ? 'selected' : '' }}>Pediatría</option>
                    </select>
                </div>

                <!-- Botón Actualizar -->
                <div class="text-center">
                    <button type="submit" 
                        class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white py-2 px-4 rounded hover:from-blue-600 hover:to-cyan-600">
                        Actualizar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>