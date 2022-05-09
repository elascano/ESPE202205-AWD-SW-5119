import React, { Component } from 'react';
import img1 from '../ImagenesProyecto/1.jpg';
import img2 from '../ImagenesProyecto/2.jpg';
import img3 from '../ImagenesProyecto/3.jpg';
import img4 from '../ImagenesProyecto/4.jpg';
import img5 from '../ImagenesProyecto/5.jpg';
import img6 from '../ImagenesProyecto/6.jpg';
import img7 from '../ImagenesProyecto/7.jpg';
import img8 from '../ImagenesProyecto/8.jpg';

class Servicios extends Component{
    render(){
    return(
        <div>
            <body className="grid-container">
            <article className="main">
            <div className="contenido">
                   <a>
                    Tratamientos cosméticos faciales
                    </a> 
                        
                    
                    <div>
                        <img src={img1} width="100" height="100" />
                    </div>
                    <p>
                        EL tratamientos com (mascarillas regeneradoras) manuales o con aparatología facial ayuda a combatir las secuelas
                        del paso del tiempo.
                    </p>    
            </div>
            <div className="contenido">
                <a>
                    Tratamientos Corporales para afirmar y moldear el cuerpo
                </a>
                <div>
                    <img src={img2} width="100" height="100" />
                </div>
                <p> El poder eliminar los depósitos de tejidos adiposos, que mientras más grandes son más afectan la imagen de la persona,
                    es una de las principales metas cuando el reflejo en el espejo ya no es agradable.Por lo que hoy en día hay tratamientos
                    reductivos como DLM y Madero terapia que no son invasivos, además para la celulitis, flacidez, estrías, entre otros.
                </p>
            </div>
            <div className="contenido">
                <a>
                    Depilación (Métodos no invasivos)
                </a>
                <div>
                    <img src={img3} width="100" height="100" />
                </div>
                <p> Procesos para eliminar vello de distintas zonas del cuerpo, utilizando cera corporal y
                    facial, depilaciones eléctricas, laser (eliminación definitiva del vello)
                </p>
            </div>
            <div className="contenido">
                <a>
                    Masajes
                </a>
                <div>
                    <img src={img4} width="100" height="100" />
                </div>
                <p> Técnicas que brindan beneficios físicos y emocionales. Con aromaterapia aceites
                    esenciales que ayudan a disminuir tenciones y estrés a los pacientes, entre los que pueden ser
                    Terapéuticos, Relajantes y Reductivos                
                </p>
            </div>
            <div className="contenido">
                <a>
                    Maquillaje facial y corpora
                </a>
                <div>
                    <img src={img5} width="100" height="100" />
                </div>
                <p> 
                    Decorativo (no invasivo), artístico, naturales e intensos, para diversas ocasiones
                </p>
            </div>
            <div className="contenido">
                <a>
                    Uso de Aparatología Estética
                </a>
                <div>
                    <img src={img6} width="100" height="100" /> 
                </div>
                <p>Muchas maquinas que había desde hace muchos años, y que en la época moderna se han
                    actualizado y con nanotecnología en algunos casos, como Carboxiterapia, alta frecuencia,
                    ultrasonido, ultracavitación, ozonoterapia, gimnasia pasiva, entre otros
                </p>
            </div>
            <div className="contenido">
                <a>
                    Manicura y Pedicura
                </a>
                <div>
                    <img src={img7} width="100" height="100" />
                </div>
                <p> Técnicas de limpieza, exfoliación, masaje, diseño y color en las uñas de manos y pies
                    reflejando buena imagen y bienestar personal
                    
                </p>
            </div>
            <div className="contenido">
                <a>
                    Asesoría de Imagen
                </a>
                <div>
                    <img src={img8} width="100" height="100" />
                </div>
                <p> Un Centro Estético al ser Integral puede ofrecer servicios adicionales de cambio de
                    look o imagen con el fin de que la persona encuentre todos los servicios en un solo
                    establecimiento, incluyendo asesoría de imagen completa y menús nutricionales para
                    mantener su salud y su figura.
                </p>
            </div>
        </article>
         <footer class="footer">
         <div class="contenedor">
             Centro Estetico Integral LAEL &copy; 2021
         </div>
     </footer>
            </body>
        </div>
         
    );
}
}
export default Servicios;