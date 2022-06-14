import React from 'react';
import {Link} from 'react-router-dom'
export default function informacion() {
  return ( <React.Fragment>
 <section className="cabeza2">
        <nav>
        <Link to='/'><img src="imagenes/logo.png" /></Link>
          <div className="links"> 
          <ul> 
          <li><Link to='/reser'>Reservaciones</Link></li>  
          <li><Link to='/info'>Promociones</Link></li>
          <li><Link to='/about'>Nosotros</Link></li></ul></div>
        </nav>
        <div className="mensaje">
            <h1>PROMOCIONES</h1>
        </div>
  </section >
  <section className="cuerpo">
  <h1> Nuestras Promociones </h1>
   <h1> Nuestro Restaurante Cuenta con diferentes promociones, que varian para las preferencias de nuestro clientes.</h1>
   <h1> Siempre buscamos su comodidad y facilidad.</h1> 
   <br></br>
  </section>
  <section className="promociones">
    <h1 className="titulo-centro white"> Promociones Disponibles</h1>
    <div className=" mx-auto w-50">
    <div id="promociones" className="carousel slide" data-ride="carousel">
        <ul className="carousel-indicators">
          <li data-target="#promociones" data-slide-to={0} className="active" />
          <li data-target="#promociones" data-slide-to={1} />
          <li data-target="#promociones" data-slide-to={2} />
          <li data-target="#promociones" data-slide-to={3} />
          <li data-target="#promociones" data-slide-to={4} />
        </ul>
        <div className="carousel-inner">

          <div className="carousel-item active">
            <img src="imagenes/promocion1.jpg" alt="Promocion1" width={1200} height={650} />
            <div className="carousel-caption">
            </div>   
          </div>
          <div className="carousel-item">
            <img src="imagenes/promocion2.png" alt="Promocion2" width={1200} height={650} />
            <div className="carousel-caption">

            </div>   
          </div>
          <div className="carousel-item">
            <img src="imagenes/promocion3.jpg" alt="Promocion3" width={1200} height={650} />
            <div className="carousel-caption">

            </div>   
          </div>
          <div className="carousel-item">
            <img src="imagenes/promocion4.png" alt="Promocion4" width={1200} height={650} />
            <div className="carousel-caption">
 
            </div>   
          </div>
          <div className="carousel-item">
            <img src="imagenes/promocion5.jpg" alt="Promocion5" width={1200} height={650} />
            <div className="carousel-caption">
            </div>   
          </div>

        </div>
        <a className="carousel-control-prev" href="#promociones" data-slide="prev">
          <span className="carousel-control-prev-icon" />
        </a>
        <a className="carousel-control-next" href="#promociones" data-slide="next">
          <span className="carousel-control-next-icon" />
        </a>
      </div>
    </div>   
    </section>
    <section className="pie">
    Promociones Validas hasta agotar stock<br></br>
    Reservamos el derecho a cambios y modificaciones
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
  </React.Fragment>);
}

