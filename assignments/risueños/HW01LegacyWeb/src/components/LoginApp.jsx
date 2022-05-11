import React, { useState } from "react";
import ReactDOM from "react-dom";
import { supabase } from "../supabaseClient";
import '../css/Form.css'

const LoginApp = () => {
  // React States
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  async function handleSingUp(email, password) {
    try {
      const { user, error } = await supabase.auth.signIn({
        email: email,
        password: password,
      });

      if (error) {
        console.log(error);
        alert("Credenciales incorrectas!");
      } else {
        alert("Bienvenido!");
      }
      if (user) {
        console.log(user);
      }
    } catch (e) {
      console.log(e);
    }
  }

  // JSX code for login form
  const renderForm = (
    <div className="login-form">
      <div className="login-input-container">
        <label>Correo electronico</label>
        <input value={email} onChange={(e) => setEmail(e.target.value)} />
      </div>
      <div className="login-input-container">
        <label>Constraseña</label>
        <input value={password} type="password" onChange={(e) => setPassword(e.target.value)} />
      </div>
      <div className="login-button-container">
        <button onClick={() => handleSingUp(email, password)}>
          Iniciar Sesion
        </button>
      </div>
    </div>
  );

  return (
    <div className="login-app">
      <div className="login-form">
        <div className="login-title">Iniciar Sesión</div>
        {renderForm}
      </div>
    </div>
  );
};

const rootElement = document.getElementById("root");
ReactDOM.render(<LoginApp />, rootElement);
export default LoginApp;
