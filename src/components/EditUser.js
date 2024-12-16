import React, { useState, useEffect } from 'react';

const EditUser = ({ userId }) => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Llamada a la API para obtener el usuario actual
    fetch(`http://localhost/users/${userId}`)
      .then(response => response.json())
      .then(data => setUser(data))
      .catch(error => console.error('Error fetching user:', error));
  }, [userId]);

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await fetch(`http://localhost/users/${userId}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(user),
      });

      if (response.ok) {
        alert('Usuario actualizado correctamente');
      } else {
        alert('Error al actualizar el usuario');
      }
    } catch (error) {
      console.error('Error updating user:', error);
    }
  };

  if (!user) {
    return <div>Cargando...</div>;
  }

  return (
    <div>
      <h2>Editar Usuario</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          placeholder="Nombre"
          value={user.name}
          onChange={(e) => setUser({ ...user, name: e.target.value })}
        />
        <input
          type="text"
          placeholder="Apellido"
          value={user.lastname}
          onChange={(e) => setUser({ ...user, lastname: e.target.value })}
        />
        <input
          type="text"
          placeholder="Teléfono"
          value={user.phone}
          onChange={(e) => setUser({ ...user, phone: e.target.value })}
        />
        <input
          type="text"
          placeholder="Dirección"
          value={user.address}
          onChange={(e) => setUser({ ...user, address: e.target.value })}
        />
        <input
          type="email"
          placeholder="Correo Electrónico"
          value={user.mail}
          onChange={(e) => setUser({ ...user, mail: e.target.value })}
        />
        <input
          type="password"
          placeholder="Contraseña"
          value={user.password}
          onChange={(e) => setUser({ ...user, password: e.target.value })}
        />
        <input
          type="number"
          placeholder="Rol ID"
          value={user.rol_id}
          onChange={(e) => setUser({ ...user, rol_id: e.target.value })}
        />
        <input
          type="number"
          placeholder="Specialty ID"
          value={user.specialty_id}
          onChange={(e) => setUser({ ...user, specialty_id: e.target.value })}
        />
        <button type="submit">Actualizar Usuario</button>
      </form>
    </div>
  );
};

export default EditUser;