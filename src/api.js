import axios from 'axios';

const API_URL = 'http://localhost:8000/api/users'; // La URL de tu backend en Laravel

// Obtener todos los usuarios
export const getUsers = async () => {
  try {
    const response = await axios.get(API_URL);
    return response.data;  // Regresa la lista de usuarios
  } catch (error) {
    console.error('Error fetching users:', error);
  }
};

// Crear un nuevo usuario
export const createUser = async (userData) => {
  try {
    const response = await axios.post(API_URL, userData);
    return response.data;  // Regresa el usuario creado
  } catch (error) {
    console.error('Error creating user:', error);
  }
};

// Obtener un usuario específico
export const getUser = async (id) => {
  try {
    const response = await axios.get(`${API_URL}/${id}`);
    return response.data;  // Regresa los datos del usuario
  } catch (error) {
    console.error('Error fetching user:', error);
  }
};

// Actualizar un usuario
export const updateUser = async (id, userData) => {
  try {
    const response = await axios.put(`${API_URL}/${id}`, userData);
    return response.data;  // Regresa el usuario actualizado
  } catch (error) {
    console.error('Error updating user:', error);
  }
};

// Eliminar un usuario
export const deleteUser = async (id) => {
  try {
    const response = await axios.delete(`${API_URL}/${id}`);
    return response.data;  // Regresa el mensaje de eliminación
  } catch (error) {
    console.error('Error deleting user:', error);
  }
};