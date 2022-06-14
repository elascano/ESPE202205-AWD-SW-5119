import React from 'react';
import {Link} from 'react-router-dom'
export default function Home() {
  return (<React.Fragment>
      <section className="cabeza">
    <nav>
    <Link to='/'><img src="imagenes/logo.png" class="logo" /></Link>
      <div className="links"> 
        <ul>   
          <li><Link to='/reser'>Reservaciones</Link></li>  
          <li><Link to='/info'>Promociones</Link></li>
          <li><Link to='/about'>Nosotros</Link></li></ul></div>
    </nav>
    <div className="mensaje">
      <h1>RESTAURANTE "RUTA 66"</h1>
      <p>Sabemos lo que te gusta.</p>
    </div>
  </section>
  <section className="cuerpo">
    <h1>BIENVENIDO AL MEJOR LUGAR DE COMIDA! </h1>
    <p>AQUI ENCONTRARAS VARIEDAD EN COMIDA RÁPIDA DE CALIDAD</p>
    <div className="fotoRestaurante">
      <img src="imagenes/restaurante.jpg" width="600px" />
    </div>
  </section>
  <section className="menu">
    <h1>#FAST FOOD</h1>
    <div className="columna">
      <div className="foto">
        <img src="imagenes/comida1.jpg" />
      </div>
      <div className="foto">
        <img src="imagenes/comida2.jpg" />
      </div>
      <div className="foto">
        <img src="imagenes/comida3.jpg" />
      </div>
    </div>
  </section>
  <section className="menu2">
    <div className="columna">
      <div className="foto">
        <img src="imagenes/comida4.jpg" />
      </div>
      <div className="foto">
        <img src="imagenes/comida5.jpg" />
      </div>
      <div className="foto">
        <img src="imagenes/comida6.jpg" />
      </div>
    </div>
  </section>
  <section className="pie">
    <h4>ENCUÉNTRANOS EN: </h4>
    <p> Eugenio Espejo &amp; Isidro Ayora, Yaruquí
      TELEFONO: (02) 281-125 / 0989356590</p>
      <div className="columna1">
    <div className="iconos">
      <a href="https://www.facebook.com/ruta66steakhouse"><i className="fab fa-facebook-f" /></a> </div>
      <div className="iconos">
      <a href="https://www.instagram.com/ruta66_steakhouse/?hl=es-la"> <i className="fab fa-instagram" /></a>
    </div>
    </div>
  </section>
  </React.Fragment>)
}
