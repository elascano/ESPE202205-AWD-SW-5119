import React, { Component } from 'react';
import Logo from '../logoLael1.png';
import {Link} from 'react-router-dom'
class Header extends Component{
    render(){
    return(
        
<nav className="navbar navbar-expand-lg navbar-dark  color-nav">
  <div className="container-fluid">
    <div  className="logo">
            <img src={Logo} />     
    </div>
    <div className="collapse navbar-collapse" id="navbarColor01">
      <ul className="navbar-nav me-auto">
        <li className="nav-item">
          <Link className="nav-link active" to='/Inicio'><p className='letra'>Inicio</p></Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to='/Quienes_Somos'><p className='letra'>¿Quienes Somos?</p></Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to='/Servicios'><p className='letra'>Servicios</p></Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to='/Contacto'><p className='letra'>Contactos</p></Link>
        </li>
        <li className="nav-item">
          <Link className="nav-link" to="/Formulario"><p className='letra'>Formulario</p></Link>
        </li>
        
      </ul>
      <div className='caja-social_netwoks'>

        <div className="social-networks">
            <a className="nav-item"> <Link className="nav-link" to="/Registrarse"className="Registrarse"><i className="fas fa-user-tie" ></i></Link> </a>
            <a href="https://www.facebook.com/LaelCEI/?ti=as" className="facebook"><i className="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com/centro_estetico_lael?utm_medium=copy_link" className="instagram"><i className="fab fa-instagram"></i></a>
        </div>
      </div>  
    </div>
  </div>
</nav>    
    );
}
}
export default Header;