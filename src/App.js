import React from 'react';
import './App.css';
import UsersList from './components/UsersList';  // Asegúrate de que la ruta sea correcta
import CreateUserForm from './components/CreateUserForm'; // Formulario para crear usuarios

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h1>Bienvenido a la aplicación de usuarios</h1>
      </header>
      <main>
        <CreateUserForm /> {/* Formulario para crear un usuario */}
        <UsersList />  {/* Aquí se muestra el componente UsersList */}
      </main>
    </div>
  );
}

export default App;