import React, { Component } from 'react';
import Img1 from './ImagenesProyecto/marquesina1.gif'
import Img2 from './ImagenesProyecto/marquesina4.gif'
import Img3 from './ImagenesProyecto/marquesina3.gif'
import Img4 from './ImagenesProyecto/marquesina2.gif'

class Carrusel extends Component{
    render(){
    return(
    <div id="myCarousel" className="carousel slide" data-bs-ride="carousel">
        <div className="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" className="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div className="carousel-inner">
            <div className="carousel-item active">
                <div className="container">
                    <img src={Img1} className="imagenIndex1"/>
                    <h1 className='cambio-color'>BIENVENIDOS A LAEL !!</h1>
                    <p>"El esteticista integra, se dedica a hacer tratamientos de belleza, enfocados especialmente hacia la piel" </p>
                </div>
            </div>
            <div className="carousel-item">
                <div className="container">
                    <img src={Img2} className="imagenIndex1"/>
                    <h1 className='cambio-color'>CUIDAMOS TU IMAGEN PERSONAL</h1>
                    <p> La imagen es una carta de presentación que expresa la manera de ser de cada persona</p>
                    
                </div>
            </div>
            <div className="carousel-item">
                <div className="container">
                    <img src={Img3} className="imagenIndex1"/>
                    <h1 className='cambio-color'>MASAJES FACIALES</h1>
                    <p>Estimular el sistema linfático, eliminando las toxinas responsables de imperfecciones.</p>
                    
                </div>
            </div>
            <div className="carousel-item">
                <div className="container">
                <img src={Img4} className="imagenIndex1"/>
                    <h1 className='cambio-color'>MANICURE</h1>
                    <p>tratamiento de belleza cosmético para las uñas y manos </p>
                    
                </div>
            </div>
            
        </div>
        <button className="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span className="carousel-control-prev-icon" aria-hidden="true"></span>
            <span className="visually-hidden">Previous</span>
          </button>
          <button className="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span className="carousel-control-next-icon" aria-hidden="true"></span>
            <span className="visually-hidden">Next</span>
          </button>
    </div>
    );
}
}
export default Carrusel;