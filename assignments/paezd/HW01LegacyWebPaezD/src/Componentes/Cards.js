import React, { Component } from 'react';
import Imagen1 from './ImgContactos/Antoni.jpg';
import Imagen2 from './ImgContactos/Ali.jpeg';
import Imagen3 from './ImgContactos/Diego.jpg';  
import Imagen4 from './ImgContactos/Elian.jpg';    
class Cards extends Component{
    render(){
    return(
  <div className="card-group">
    <div className="card">
        <img src={Imagen1} className="card-img-top"/>
        <div className="card-body">
        <h5 className="card-title text-center">Antoni Toapanta</h5>
        <p className="card-text">Telefono:09******** <br/>Correo:artoapanta3@espe.edu.ec <br/>Facebook:Antoni Toapanta</p>
        <p className="card-text"></p>

        </div>
  </div>
  <div className="card">
    <img src={Imagen2} class="card-img-top"/>
    <div className="card-body">
      <h5 className="card-title text-center">Alisson Clavijo</h5>
      <p className="card-text">Telefono:09******** <br/> Correo:artoapanta3@espe.edu.ec <br/>Facebook:Ali Clavijo</p>
    </div>
  </div>
  <div className="card">
    <img src={Imagen3} class="card-img-top"/>
    <div className="card-body">
      <h5 className="card-title text-center">Diego Paez</h5>
      <p className="card-text">Telefono:09******** <br/> Correo:artoapanta3@espe.edu.ec <br/> Facebook:Diego Alexander </p>
    </div>
  </div>
  <div className="card">
    <img src={Imagen4} class="card-img-top"/>
    <div className="card-body">
      <h5 className="card-title text-center">Elian Garces</h5>
      <p className="card-text">Telefono:09******** <br/> Correo:artoapanta3@espe.edu.ec <br/> Facebook:Elian Garces</p>
    </div>
  </div>
</div>
    );
}
}
export default Cards;