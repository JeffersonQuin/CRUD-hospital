<!-- resources/views/users/edit.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario - Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Editar Usuario</h1>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Asegura que se use el método PUT para actualizar -->

                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required>
                <input type="text" name="address" value="{{ old('address', $user->address) }}" required>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                <input type="password" name="password" placeholder="Contraseña (opcional)">
                <input type="text" name="rol_id" value="{{ old('rol_id', $user->rol_id) }}" required>
                <input type="text" name="specialty_id" value="{{ old('specialty_id', $user->specialty_id) }}" required>

                <button type="submit">Actualizar Usuario</button>
            </form>
        </div>
    </div>
</body>
</html>