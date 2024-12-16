import React from 'react';

const DeleteUser = ({ userId, onDelete }) => {
  const handleDelete = async () => {
    try {
      const response = await fetch(`http://localhost/users/${userId}`, {
        method: 'DELETE',
      });

      if (response.ok) {
        alert('Usuario eliminado correctamente');
        onDelete(userId);  // Eliminar el usuario de la lista
      } else {
        alert('Error al eliminar el usuario');
      }
    } catch (error) {
      console.error('Error deleting user:', error);
    }
  };

  return (
    <div>
      <button onClick={handleDelete}>Eliminar Usuario</button>
    </div>
  );
};

export default DeleteUser;