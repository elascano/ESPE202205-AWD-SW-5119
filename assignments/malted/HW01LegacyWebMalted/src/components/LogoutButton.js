import React from "react";
import { useAuth0 } from "@auth0/auth0-react";
import "./login_logout.css"
const LogoutButton = () => {
  const { logout } = useAuth0();
  return <button className="logout" onClick={() => logout()}>Salir</button>
};

export default LogoutButton;