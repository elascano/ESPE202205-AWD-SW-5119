import React from 'react'
import "./Contact.css"
import LoginButton from './LoginButton';
import LogoutButton from './LogoutButton';
import Profile from './Profile';
import { useAuth0 } from "@auth0/auth0-react";

const Contact = () => {
  const { isAuthenticated, isLoading } = useAuth0();

  if (isLoading) {
    return <h1>Cargando....</h1>
  }

  return (
    <><center><h1 className="titulo">Ordene su pedido aquí</h1></center>
    <><div className="container__slider">
      <div className="container">
        <input type="radio" name="slider" id="item-1" defaultChecked></input>
        <input type="radio" name="slider" id="item-2"></input>
        <input type="radio" name="slider" id="item-3"></input>

        <div className="cards">
          <label className="card" htmlFor="item-1" id="selector-1">
            <img src="/img/images/img1.png"></img>
          </label>
          <label className="card" htmlFor="item-2" id="selector-2">
            <img src="/img/images/img2.png"></img>
          </label>
          <label className="card" htmlFor="item-3" id="selector-3">
            <img src="/img/images/img3.png"></img>
          </label>

        </div>
      </div>
    </div>

      <div className="Botton">
        <center>
          {isAuthenticated ? <LogoutButton /> : <LoginButton />}
          <Profile />
        </center>
      </div></></>
    );
}

export default Contact