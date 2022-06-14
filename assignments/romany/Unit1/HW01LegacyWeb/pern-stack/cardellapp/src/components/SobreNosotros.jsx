import React, { Component } from 'react';
import vision from './vision.png';
import mision from './mision.jpg';
import trabajadores from './trabajadores.png';
import mantenimiento from './mantenimiento.jpg';
class SobreNosotros extends Component {
    render() {
        return (
            <div>        
                <section className='presentacion' id="sobreNosotros">
                    <h2 className='subtitulo_texto'>Nuestra empresa</h2>
                    <p className="presentacion_texto">Muebles metálicos y sistemas modulares “CarDel” es un empresa dinámica y actual que desde
                        su creación hace 28 años, busca soluciones
                        óptimas para el equipamiento de oficinas y
                        espacios operativos.
                        Es una organización moderna que ha sabido
                        seguir las tendencias de un mercado cada vez
                        más exigente, especializándose en la
                        fabricación y comercialización de mobiliario de
                        oficina, de un producto acorde con las
                        necesidades de cada cliente.
                    </p>
                </section>

                <section className="about">
                    <div className="about_text">
                        <h2 className="subtitulo_texto">Misión</h2>
                        <p className="about_parra">Producir muebles de durabilidad y excelente calidad,
                            logrando de esta manera satisfacer las necesidades
                            de nuestros clientes; utlizando para cumplir con este
                            objetivo un equipo de trabajo altamente calificado y
                            capacitado.</p>
                    </div>
                    <figure className="about_img about_img_left">
                    <div><img src={mision} className="about_imagen"/></div>
                    </figure>

                    
                    <figure className="about_img">
                       <div><img src={vision} className="about_imagen"/></div>
                    </figure>
                    <div className="about_text">
                        <h2 className="subtitulo_texto">Visión</h2>
                        <p className="about_parra" >
                            Convertirnos en los primeros proveedores de mobiliario del país, utilizando los más altos stándares de calidad.
                        </p>
                    </div>

                    <div className="about_text">
                        <h2 className="subtitulo_texto">Nuestro equipo</h2>
                        <p className="about_parra">
                            Nuestra empresa cuenta con 30 empleados, personal
                            capacitado para cada departamento que requiere la
                            empresa y de acuerdo a la necesidad del cliente.
                        </p>
                    </div>
                    <figure className="about_img">
                        <div><img src={trabajadores} className="about_imagen"/></div>
                    </figure>
                    <div className="about_text">
                        <h2 className="subtitulo_texto">Productos</h2>
                        <p className="about_parra">Nuestra empresa ofrece los siguientes productos:</p>
                        <ul className="listaProductos">
                            <li className="about_list">Pupitres para instituciones </li>
                            <li className="about_list">Sistemas modulares</li>
                            <li className="about_list">  Estaciones de trabajo</li>
                            <li className="about_list">  Divisiones modulares</li>
                            <li className="about_list"> Mesas de conferencias</li>
                            <li className="about_list"> Sillonería ergonómica</li>
                            <li className="about_list"> Counters</li>
                            <li className="about_list"> Linea gerencial</li>
                            <li className="about_list"> Panelería</li>
                            <li className="about_list"> Archivadores</li>
                            <li className="about_list"> Vitrinas </li>                
                            <li className="about_list"> Estanterías</li>
                            <li className="about_list"> Salas de espera</li>
                            <li className="about_list"> Muebles para restaurantes</li>
                            <li className="about_list"> Muebles sobre medida </li>
                        </ul>
                        
            
                    </div>
                    <div className="about_text">
                        <h2 className="subtitulo_texto">Servicios</h2>
                        <p className="about_parra">Presentamos los servicios que nuestra empresa brinda:</p>
                        <ul className="listaProductos">
                            <li className="about_list">Lacado </li>
                            <li className="about_list"> Arreglo y mantenimiento total</li>
                            <li className="about_list">  Pintura electrostatica</li>  
                        </ul>
                           
                        <figure className="about_img">
                            <img src={mantenimiento} className="about_imagen1"/>
                        </figure>
                        
                        <a href="#" className="boton1">Ver Catalogo</a>
                    </div>
                   
                    
                </section>
                
            </div>
        );
    }
}

export default SobreNosotros;