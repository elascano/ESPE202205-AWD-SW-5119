import React from "react";
import { useAuth0 } from "@auth0/auth0-react";
import "./Profile.css"
import JSONPretty from "react-json-pretty";
import "react-json-pretty/themes/monikai.css";

const Profile = () => {
  const { user, isAuthenticated } = useAuth0();
  console.log(user);
  // return <pre>{JSON.stringify(user, null, 2)}</pre>;
  return (
    isAuthenticated && (
      <><center>
        <div className="datos"> 
        <br></br>
          <h1>Usuario</h1>
          <img className="fotoPerfil"  src={user.picture} alt={user.name} />
          <h2>{user.name}</h2>
          <p>{user.email}</p>
        </div>
      </center>
      <h1>Seguir editando desde aqui..</h1></>
    )
  );
};

export default Profile;