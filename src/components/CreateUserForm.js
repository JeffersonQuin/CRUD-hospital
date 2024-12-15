import React, { useState } from 'react';
import axios from 'axios';

const CreateUserForm = () => {
  const [formData, setFormData] = useState({
    name: '',
    lastname: '',
    phone: '',
    address: '',
    mail: '',
    password: '',
    rol_id: '',
    specialty_id: ''
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const response = await axios.post('http://localhost:8000/api/users', formData);

      // Verifica la respuesta del servidor en la consola
      console.log('Respuesta del servidor:', response);

      if (response.status === 201) {
        setFormData({
          name: '',
          lastname: '',
          phone: '',
          address: '',
          mail: '',
          password: '',
          rol_id: '',
          specialty_id: ''
        }); // Resetea el formulario
        alert('Usuario creado correctamente');
      } else {
        alert('Hubo un problema al crear el usuario');
      }
    } catch (error) {
      console.error('Error creando el usuario', error);
      alert('Error al registrar el usuario');
    }
  };

  return (
    <div>
      <h3>Crear Nuevo Usuario</h3>
      <form onSubmit={handleSubmit}>
        <input type="text" name="name" value={formData.name} onChange={handleInputChange} placeholder="Nombre" required />
        <input type="text" name="lastname" value={formData.lastname} onChange={handleInputChange} placeholder="Apellido" required />
        <input type="text" name="phone" value={formData.phone} onChange={handleInputChange} placeholder="Teléfono" required />
        <input type="text" name="address" value={formData.address} onChange={handleInputChange} placeholder="Dirección" required />
        <input type="email" name="mail" value={formData.mail} onChange={handleInputChange} placeholder="Correo electrónico" required />
        <input type="password" name="password" value={formData.password} onChange={handleInputChange} placeholder="Contraseña" required />
        <select name="rol_id" value={formData.rol_id} onChange={handleInputChange} required>
          <option value="">Selecciona rol</option>
          <option value="1">Admin</option>
          <option value="2">User</option>
        </select>
        <select name="specialty_id" value={formData.specialty_id} onChange={handleInputChange} required>
          <option value="">Selecciona especialidad</option>
          <option value="1">Developer</option>
          <option value="2">Designer</option>
        </select>
        <button type="submit">Crear Usuario</button>
      </form>
    </div>
  );
};

export default CreateUserForm;