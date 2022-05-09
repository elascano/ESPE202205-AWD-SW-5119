import React, { Component } from 'react';
import Carrusel from '../Carrusel';
class Inicio extends Component{
    render(){
       
    return(
         <><><>
            <Carrusel /></>
         <div class="textoPrincipal">
             <p></p>
        </div>        
        <div class="grid">
                    <div class="content1">MARTES Promicion 2x1 </div>
                    <div class="content2">MIERCOLES descuentos en mascarillas</div>
                    <div class="content3">JUEVES descuento en masajes</div>
                    <div class="content4">VIERNES 10% de descuento en radiofrecuencia</div> 
         </div> 
         
         </> <footer class="footer">
            <div class="contenedor">
                Centro Estetico Integral LAEL &copy; 2021
            </div>
        </footer></>  
    );
    
}

}
export default Inicio;