import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/users'; // La URL de tu backend en Laravel

// Obtener todos los usuarios
export const getUsers = async () => {
  try {
    const response = await axios.get(API_URL);
    return response.data;  // Regresa la lista de usuarios
  } catch (error) {
    console.error('Error fetching users:', error);
    throw error; // Lanza el error para que el componente que llama pueda manejarlo
  }
};

// Crear un nuevo usuario
export const createUser = async (userData) => {
  try {
    // Asegúrate de que los campos enviados sean correctos según el backend
    const response = await axios.post(API_URL, {
      name: userData.name,              // El nombre del usuario
      email: userData.email,            // El correo del usuario
      password: userData.password,      // La contraseña
      role_id: userData.role_id,        // ID del rol (si corresponde)
      specialty_id: userData.specialty_id // ID de especialidad (si corresponde)
    });

    return response.data;  // Regresa el usuario creado
  } catch (error) {
    console.error('Error creating user:', error);
    throw error; // Lanza el error para que el componente que llama pueda manejarlo
  }
};

// Obtener un usuario específico
export const getUser = async (id) => {
  try {
    const response = await axios.get(`${API_URL}/${id}`);
    return response.data;  // Regresa los datos del usuario
  } catch (error) {
    console.error('Error fetching user:', error);
    throw error; // Lanza el error para que el componente que llama pueda manejarlo
  }
};

// Actualizar un usuario
export const updateUser = async (id, userData) => {
  try {
    const response = await axios.put(`${API_URL}/${id}`, {
      name: userData.name,              // El nombre del usuario
      email: userData.email,            // El correo del usuario
      role_id: userData.role_id,        // ID del rol (si corresponde)
      specialty_id: userData.specialty_id // ID de especialidad (si corresponde)
    });

    return response.data;  // Regresa el usuario actualizado
  } catch (error) {
    console.error('Error updating user:', error);
    throw error; // Lanza el error para que el componente que llama pueda manejarlo
  }
};

// Eliminar un usuario
export const deleteUser = async (id) => {
  try {
    const response = await axios.delete(`${API_URL}/${id}`);
    return response.data;  // Regresa el mensaje de eliminación
  } catch (error) {
    console.error('Error deleting user:', error);
    throw error; // Lanza el error para que el componente que llama pueda manejarlo
  }
};