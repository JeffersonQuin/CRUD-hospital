<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Mostrar todos los usuarios.
     */
    /*
    public function index()
    {
        // Si estás construyendo una API, puedes devolver los usuarios en formato JSON:
        $users = User::all();
        return response()->json($users);
        
        // Si estás utilizando vistas Blade, pasas la variable $users a la vista:
        // $users = User::all();
        // return view('users.index', compact('users'));
    }*/
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Pasar los usuarios a la vista 'users.index'
        return view('users.index', compact('users'));
    }
    /**
     * Crear un nuevo usuario.
     */
    public function store(Request $request)
{
    try {
        // Validar datos
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'rol_id' => 'required|exists:roles,id',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol_id' => $request->rol_id,
            'specialty_id' => $request->specialty_id,
        ]);

        // Mensaje de éxito
        session()->flash('success', 'Usuario registrado exitosamente.');

    } catch (\Exception $e) {
        // En caso de error, mensaje con el error
        session()->flash('error', 'Hubo un problema al registrar al usuario: ' . $e->getMessage());
    }

    return redirect()->back();
}

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Actualizar un usuario.
     */
    public function update(Request $request, $id)
{
    // Validar los datos
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|min:8',
        'rol_id' => 'required|integer',
        'specialty_id' => 'required|integer',
    ]);

    // Encontrar al usuario por ID
    $user = User::findOrFail($id);

    // Actualizar el usuario
    $user->update($validated);

    // Redirigir al listado con un mensaje de éxito
    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
}

    /**
     * Eliminar un usuario.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
    public function edit($id)
{
    // Buscar al usuario por ID
    $user = User::findOrFail($id);

    // Pasar el usuario a la vista de edición
    return view('users.edit', compact('user'));
}
}