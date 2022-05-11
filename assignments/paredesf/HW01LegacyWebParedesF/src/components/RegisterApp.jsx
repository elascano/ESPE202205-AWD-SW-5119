import React, { useState } from "react";
import ReactDOM from "react-dom";
import { supabase } from "../supabaseClient";
import '../css/Form.css'

const RegisterApp = () => {
  // React States
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");

  async function registerUser(email, password) {
    try {
      console.log(email, password);
      const { user, error } = await supabase.auth.signUp({
        email: email,
        password: password,
      });
      if (error) {
        console.log(error.message);
        alert("Credenciales incorrectas!");
      } else {
        alert("User registered successfully");
      }
    } catch (e) {
      console.log(e);
    }
  }

  // JSX code for login form
  const renderForm = (
    <div className="form">
     
        <div className="login-input-container">
          <label>Correo </label>
          <input 
          value={email} 
          onChange={(e) => setEmail(e.target.value)}
           />
        </div>
        <div className="login-input-container">
          <label>Contraseña </label>
          <input
            value={password}
            type="password"
            onChange={(e) => setPassword(e.target.value)}
          />
        </div>
        <div className="login-button-container">
          <button onClick={() => registerUser(email, password)}>
            Registrarse
          </button>
        </div>
    
    </div>
  );

  return (
    <div className="register-app">
      <div className="register-form">
        <div className="login-title">Registrarse</div>
        {renderForm};
      </div>
    </div>
  );
};

const rootElement = document.getElementById("root");
ReactDOM.render(<RegisterApp />, rootElement);
export default RegisterApp;
