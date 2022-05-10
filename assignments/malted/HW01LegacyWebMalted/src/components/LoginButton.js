import React from "react";
import { useAuth0 } from "@auth0/auth0-react";
import "./login_logout.css"
const LoginButton = () => {
  const { loginWithRedirect } = useAuth0();
  return (
    <div>
      <button className="login" onClick={() => loginWithRedirect()}>!Pidelo Ya¡</button>
    </div>
  );
};

export default LoginButton;