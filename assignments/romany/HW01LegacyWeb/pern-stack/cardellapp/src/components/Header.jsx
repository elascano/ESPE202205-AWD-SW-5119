import React, { Component } from 'react';
import logo1 from './LogoSinLetras.png';

class Header extends Component {
    render() {
        return (
            <div>
               <div className='textos'>
              <nav className="nav">
                  
                 {/**  <a className = "nav__items nav__items--cta" href="/Contactanos">Contactanos</a>
                  <a className = "nav__items" href='/'>Inicio</a>
                  <a className = "nav__items" href="/SobreNosotros">Sobre nosotros</a>                
                  <a className = "nav__items" href="titulo1">Productos</a>                
        <a className = "nav__items" href="#titulo1">Promociones</a> */}
                 <a className = "nav__items nav__items--cta" href="#contactanos">Contactanos</a>
                  <a className = "nav__items" href="/">Inicio</a>
                  <a className = "nav__items" href="#sobreNosotros">Sobre nosotros</a>                
                  <a className = "nav__items" href="#productos">Productos</a>                
                
              </nav>
              <div>
                  
                  <div className="imgport">
                      <div><img src={logo1}  className="imagenportada"/></div>
                      
                      <div>    
                      <h3 className="subtitulo"><b>SISTEMAS MODULARES - MUEBLES METÁLICOS</b> </h3>
                      
                  </div>
                  </div>
                 
              </div>
              <div className="but">
                  <a href="contacto.html" className="boton">Contactanos</a>
              </div>
              
          </div>	
          <div className="sesgoabajo"></div> 
            </div>
        );
    }
}

export default Header;