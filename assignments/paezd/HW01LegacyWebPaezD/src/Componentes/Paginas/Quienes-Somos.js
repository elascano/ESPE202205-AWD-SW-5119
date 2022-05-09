import React, { Component } from 'react';
import logo from '../ImagenesProyecto/logoLael2.jpg'
import local1 from '../ImagenesProyecto/local1.jpg'
import local2 from '../ImagenesProyecto/local2.jpg'
import local3 from '../ImagenesProyecto/local3.jpg'
import local4 from '../ImagenesProyecto/local4.jpg'
class Quienes_Somos extends Component{
    render(){
    return(
        <><><></>
        <main class="main-qs">

            <div class="mision"> 
                <h2>
                    Misión
                </h2>
                <p> Nuestra mision es incorporar las mejores practicas de la industria
                    de consultorias informaticas, como socios estrategicos para nuestros clientes.
                </p>
            </div>
            <div class="imagen">
                <div id="Carousel" className="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div className="carousel-indicators">
                        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div className="carousel-inner">
                        <div className="carousel-item active">
                            <img src={local1} className="diseñoimgs"/>
                        </div>
                        <div className="carousel-item">
                            <img src={local2} className="diseñoimgs"/>  
                        </div>
                        <div className="carousel-item" >
                            <img src={local3} className="diseñoimgs"/>
                        </div>
                        <div className="carousel-item">
                            <img src={local4} className="diseñoimgs"/>
                        </div>
                        
                    </div>
                    <button className="carousel-control-prev" type="button" data-bs-target="#Carousel" data-bs-slide="prev">
                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span className="visually-hidden">Previous</span>
                    </button>
                    <button className="carousel-control-next" type="button" data-bs-target="#Carousel" data-bs-slide="next">
                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                        <span className="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="vision">
                <h2>
                    Visión
                </h2>
                <p> Consolidar a la empresa como lider en Consultoria Informatica, interesada en 
                    ofrecer los mejores servicios para el crecimiento de las empresas de nuestros clientes.
                </p>
            </div>
        
        </main>
         </> <footer class="footer">
         <div class="contenedor">
             Centro Estetico Integral LAEL &copy; 2021
         </div>
        </footer></>
    );
}
}
export default Quienes_Somos;