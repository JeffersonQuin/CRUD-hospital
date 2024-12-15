import React, { useEffect, useState } from 'react';

const UserDetail = ({ userId }) => {
  const [user, setUser] = useState(null);

  useEffect(() => {
    // Llamada a la API para obtener un usuario específico
    fetch(`http://localhost/api/users/${userId}`)
      .then(response => response.json())
      .then(data => setUser(data))
      .catch(error => console.error('Error fetching user:', error));
  }, [userId]);

  if (!user) {
    return <div>Cargando...</div>;
  }

  return (
    <div>
      <h2>Detalles del Usuario</h2>
      <p><strong>Nombre:</strong> {user.name}</p>
      <p><strong>Apellido:</strong> {user.lastname}</p>
      <p><strong>Teléfono:</strong> {user.phone}</p>
      <p><strong>Dirección:</strong> {user.address}</p>
      <p><strong>Correo Electrónico:</strong> {user.mail}</p>
      <p><strong>Rol ID:</strong> {user.rol_id}</p>
      <p><strong>Specialty ID:</strong> {user.specialty_id}</p>
    </div>
  );
};

export default UserDetail;