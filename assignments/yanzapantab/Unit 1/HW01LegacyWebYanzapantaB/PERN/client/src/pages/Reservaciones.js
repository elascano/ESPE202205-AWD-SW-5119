import React, {useState} from 'react';
import {Link} from 'react-router-dom'
//import axios from 'axios';
function Reservaciones() {


const [input,setInput]=useState({
    Nombre:'',
    Email:'',
    Telefono:'',
    Motivo:'',
    Dia:'',
    Hora:'',
    Comentarios:'',
  })


   function handleChange(event){
     const{name, value}= event.target;
     setInput(prevInput=>{
       return{
         ...prevInput,
         [name]:value
       }
     })
   }

   async function  handleClick(event) {
     event.preventDefault();
     console.log(input);
     const newNote={
      Nombre:input.nombre,
      Email:input.email,
      Telefono: input.telefono,
      Motivo: input.motivo,
      Dia: input.fecha,
      Hora: input.hora,
      Comentarios:input.content
    }
    try {
      const response = await fetch("http://localhost:5000/reservaciones",{
        method:"POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(newNote)
        });
      console.log(response);
    } catch (error) {
      console.error(error.message);
    }        
     
     //axios.post('https://localhost:3001/reser',newNote);
   }
   return ( <div>
         <section class="cabeza3">
        <nav>
        <Link to='/'><img src="imagenes/logo.png" /></Link>
          <div class="links"> 
          <ul> 
          <li><Link to='/reser'>Reservaciones</Link></li>  
          <li><Link to='/menu'>Menu</Link></li>
          <li><Link to='/info'>Promociones</Link></li></ul>
          </div>
        </nav>
        <div class="mensaje">
            <h1>RESERVACIONES</h1>
        </div>
      </section>
      <section className="cuerpo">
    <h1>!QUE ESPERAS! HAS TU RESERVA HOY</h1> <br />
    <h3>Para tu seguridad, tomamos las medidas de precaución y bioseguridad para el ingreso al restaurante.</h3><br />
    <h3>Nuestro horario de atención es de Lunes a Domingo, de 8h00 a 18h00. La última reservación se la recibirá a
      las 17h00.</h3><br />
  </section>
  <section className="arreglo">
    <div className="form">
      <fieldset>
        <legend className="field">Reserva Aquí</legend>
        <form >
          <div className="input-group mb-2">
            <div className="input-group-prepend">
              <span className="input-group-text" id="basic-addon1">Nombre Completo</span>
            </div>
            <input onChange={handleChange} name='nombre'  value={input.nombre} type="text" className="form-control" placeholder="nombre completo" aria-label="Username" aria-describedby="basic-addon1" />
          </div>
          <div className="input-group mb-2">
            <div className="input-group-prepend">
              <span className="input-group-text" id="basic-addon2">Email</span>
            </div>
            <input type="email" name='email' onChange={handleChange} value={input.email} className="form-control" placeholder="Ejemplo@compania.com" aria-label="Correo Electronico" aria-describedby="basic-addon2" />
          </div>
          <div className="input-group mb-2">
            <div className="input-group-prepend">
              <span className="input-group-text" id="basic-addon3">Telefono</span>
            </div>
            <input type="text" name='telefono' onChange={handleChange}   value={input.telefono} className="form-control" id="basic-url" aria-describedby="basic-addon3" />
          </div>
          <div className="input-group mb-2">
            <div className="input-group-prepend">
              <span className="input-group-text" id="basic-addon3">Motivo</span>
            </div>
            <select className="input-group custom-select" name="motivo" id="motivo" onChange={handleChange} value={input.motivo} name='motivo'>
              <option selected>Select one</option>
              <option value="Cena especial">Cena especial</option>
              <option value="Cumpleaños">Cumpleaños</option>
              <option value="Graduación">Graduación</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div className="day form-group mb-2">
            <div className="form-row">
              <div className="col dia">
                <label htmlFor="Dia">Día</label>
              </div>
              <div className="col dia">
                <input  name='fecha' onChange={handleChange}  value={input.fecha} type="date" className="form-control" />
              </div>
              <div className="col dia">
                <label htmlFor="Hora">Hora</label>
              </div>
              <div className="col dia"> 
                <input type="time" name='hora' onChange={handleChange}  value={input.hora}className="form-control" />
              </div>
            </div>
          </div>
          <label htmlFor="comentarios">Comentarios adicionales de su reserva:</label>
          <div className="input-group">
            <textarea className="form-control ng-pristine ng-valid ng-touched" 
             onChange={handleChange} name='content' value={input.content} aria-label="With textarea" id="comentarios" rows={4} defaultValue={""} />
          </div>
          <div className="form-group mt-4">
            <button onClick={handleClick} type="button" className="btn btn-lg  btn-primary reservar">Reservar </button>
          </div>
        </form>
      </fieldset>
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
  </div>);
}
export default Reservaciones;