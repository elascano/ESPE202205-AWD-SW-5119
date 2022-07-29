import React, { useState } from "react";
import Input from "../components/Input";
import { Link } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faExclamationTriangle } from "@fortawesome/free-solid-svg-icons";
import {Grid} from "@mui/material"
import { expressions } from "../controller/Utils";
import LoginButton from "../components/GoogleLogin";
import {useEffect} from 'react';
import {gapi} from 'gapi-script';

import {
  Label,
  Form,
  CenteredButtonContainer,
  Button,
  ExitMessage,
  ErrorMessage,
} from "../components/styles/Styles";

const clientId= "950967429564-sqlg8jb6sqjpnograejcqdmnhu5kadpu.apps.googleusercontent.com";

const LogIn = () => {
  const [email, changeEmail] = useState({ field: "", valid: null });
  const [password, changePassword] = useState({ field: "", valid: null });
  const [validForm, changeValidForm] = useState(null);

  const onSubmit = (e) => {
    e.preventDefault();

    if (password.valid === "true" && email.valid === "true") {
      changeValidForm(true);
      changePassword({ field: "", valid: null });
      changeEmail({ field: "", valid: null });
    } else {
      changeValidForm(false);
    }
  };

  useEffect(() =>{
    function start(){
      gapi.client.init({
        clientId: clientId,
        scope:""
      })
    };
    gapi.load('client:auth2', start);
  });
  
  return (
    <div>
    <Grid container style={{minHeight: "100vh"}}>
      <Grid item xs={12} sm={6}>
        <img
          src="https://cdn.glitch.global/39d222eb-3256-42cb-bd19-fb6a1269a765/fisioterapia.jpg?v=1658766368634"
          style={{width: "100%", height:"100%", objectFit:"cover"}}
          alt="brand"
        />
      </Grid>
    <Grid container item xs={12} sm={6} justifyContent="center" alignItems="center" direction="column" style={{padding:10}}>
      <div>
        <Grid container justify="center">
        <Link to="/" className="navbar-brand text-center">
							Azur<span> Fisioterapia</span>
				</Link>
        </Grid>
      </div>
      <div className="container mt-5 mb-5">
        <Form action="" onSubmit={onSubmit}>
          <div>
            <Label>Correo Electrónico</Label>
            <Input
              state={email}
              changeState={changeEmail}
              type="email"
              label="Correo Electrónico"
              placeholder="marcoanthonio@gmail.com"
              name="correo"
              bugMessage="El correo ingresado no es valido."
              expresionRegular={expressions.email}
            />
          </div>
          <div>
            <Label>Contraseña</Label>
            <Input
              state={password}
              changeState={changePassword}
              type="password"
              label="Contraseña"
              placeholder="*******"
              name="password1"
              bugMessage="La contraseña ingresada no es valida"
              expresionRegular={expressions.password}
            />
          </div>
          {validForm === false && (
            <ErrorMessage>
              <p>
                <FontAwesomeIcon icon={faExclamationTriangle} />
                <b>Error:</b>Contraseña o correo incorrectos.
              </p>
            </ErrorMessage>
          )}
          <CenteredButtonContainer>
            <Button type="submit">Ingresar</Button>
            <LoginButton/>
            <p>
							¿Todavia no tienes una cuenta? <Link to="/signIn">Registrate y obten beneficios.</Link>
						</p>
            {validForm === true && (
              <ExitMessage>Estamos procesando sus datos!</ExitMessage>
            )}
          </CenteredButtonContainer>
        </Form>
      </div>
    </Grid>
    </Grid>
    </div>
  );
};
export default LogIn;
