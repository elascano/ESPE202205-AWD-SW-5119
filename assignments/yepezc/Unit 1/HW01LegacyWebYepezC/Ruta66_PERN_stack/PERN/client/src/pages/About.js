import React from 'react';
import {Link} from 'react-router-dom'
export default function About() {
  return (<React.Fragment>
      <section className="cabeza1">
          <nav>
          <Link to='/'><img src="imagenes/logo.png" /></Link>
            <div className="links"> 
              <ul> 
          <li><Link to='/reser'>Reservaciones</Link></li>  
          <li><Link to='/info'>Promociones</Link></li>
          <li><Link to='/about'>Nosotros</Link></li></ul></div>
          </nav>
          <div className="mensaje">
            <h1>NOSOTROS</h1>
          </div>
        </section>
        <section className="principio">
          <h1> Objetivos: </h1>
          <div className="oracion">
            <div>
              <i className="fas fa-hamburger" />
              <span>
                Modernos en el estilo y clásicos en el sabor. 
              </span> 
            </div>
            <div>
              <i className="fas fa-hamburger" />
              <span>
                Un equipo de profesionales que hemos creado el restaurante donde nos gustaría comer a diario y en las ocasiones especiales.. 
              </span> 
            </div>
            <div>
              <i className="fas fa-hamburger" />
              <span>
                Firmes defensores de que calidad no está en el precio, sino en el producto.
              </span> 
            </div>
            <div>
              <i className="fas fa-hamburger" />
              <span>
                Exigentes porque también somos consumidores y estamos convencidos de que la experiencia debe resultar completa.
              </span> 
            </div>
            <div>
              <i className="fas fa-hamburger" />
              <span>
                Modernos en el estilo y clásicos en el sabor. 
              </span> 
            </div>
          </div>
        </section>
        <section className="localizacion">
          <h1> MAPA: </h1>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8021832734817!2d-78.31913848524668!3d-0.16295719988110224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59295719b9fa1%3A0x50f988b5543f83c3!2sEugenio%20Espejo%20%26%20Isidro%20Ayora%2C%20Yaruqu%C3%AD!5e0!3m2!1ses!2sec!4v1644287167651!5m2!1ses!2sec" width={600} height={450} style={{border: 0}} allowFullScreen loading="lazy" />
        </section>
        <section className="contactos">
          <div className="contacto">
            <div>
              <i className="fas fa-utensils" />
              <span>
                Eugenio Espejo &amp; Isidro Ayora, Yaruquí
              </span>
            </div>
            <div>
              <i className="fas fa-phone" />
              <span>
                (02) 281-125 / 0989356590
              </span>
            </div>
            <div>
              <i className="far fa-envelope" />
              <span>
                ruta66@hotmail.com
              </span>
            </div>
          </div>
        </section>
    </React.Fragment>)
}

