import React, { useState, useEffect } from 'react';
import axios from 'axios';

const UsersList = () => {
  const [users, setUsers] = useState([]);
  const [isEditing, setIsEditing] = useState(null);

  useEffect(() => {
    fetchUsers();
  }, []);

  const fetchUsers = async () => {
    try {
      const response = await axios.get('http://127.0.0.1:8000/users', {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`, // Agrega el token de autenticación si es necesario
        },
      });
      setUsers(response.data);
    } catch (error) {
      console.error('Error fetching users', error);
    }
  };

  const deleteUser = async (id) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/users/${id}`, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`, // Token de autenticación
        },
      });
      fetchUsers();  // Vuelve a cargar los usuarios después de eliminar
    } catch (error) {
      console.error('Error deleting user', error);
    }
  };

  const startEdit = (user) => {
    setIsEditing(user);
  };

  return (
    <div>
      <h2>Lista de Usuarios</h2>
      <ul>
        {users.map((user) => (
          <li key={user.id}>
            <span>{user.name} {user.lastname} - {user.mail}</span>
            <button onClick={() => startEdit(user)}>Editar</button>
            <button onClick={() => deleteUser(user.id)}>Eliminar</button>
          </li>
        ))}
      </ul>

      {isEditing && (
        <div>
          <h3>Editar Usuario</h3>
          <EditUserForm user={isEditing} onFinishEdit={() => setIsEditing(null)} />
        </div>
      )}
    </div>
  );
};

const EditUserForm = ({ user, onFinishEdit }) => {
  const [formData, setFormData] = useState({
    name: user.name,
    lastname: user.lastname,
    phone: user.phone,
    address: user.address,
    mail: user.mail,
    password: '', // No es necesario si no lo quieres actualizar
    rol_id: user.rol_id,
    specialty_id: user.specialty_id,
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.put(`http://127.0.0.1:8000/users/${user.id}`, formData, {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`, // Autenticación
        },
      });

      if (response.status === 200) {
        onFinishEdit(); // Finaliza la edición y vuelve a cargar los usuarios
      } else {
        alert('Hubo un error al actualizar el usuario');
      }
    } catch (error) {
      console.error('Error updating user', error);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <input type="text" name="name" value={formData.name} onChange={handleInputChange} required />
      <input type="text" name="lastname" value={formData.lastname} onChange={handleInputChange} required />
      <input type="text" name="phone" value={formData.phone} onChange={handleInputChange} required />
      <input type="text" name="address" value={formData.address} onChange={handleInputChange} required />
      <input type="email" name="mail" value={formData.mail} onChange={handleInputChange} required />
      <input type="password" name="password" value={formData.password} onChange={handleInputChange} />
      <select name="rol_id" value={formData.rol_id} onChange={handleInputChange} required>
        <option value="1">Admin</option>
        <option value="2">User</option>
      </select>
      <select name="specialty_id" value={formData.specialty_id} onChange={handleInputChange} required>
        <option value="1">Developer</option>
        <option value="2">Designer</option>
      </select>
      <button type="submit">Actualizar Usuario</button>
    </form>
  );
};

export default UsersList;