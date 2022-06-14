import React, {useState,useEffect} from 'react'
import url from '../ImagenesProyecto/LogoCompletoLAEL.png'
import swal from 'sweetalert'
//npm i sweetAlert
function Formulario(){
    const[Cita,setCita]=useState({
       Nombre:'',
       Correo:'',
       Telefono:'',
       Celular:'',
       Genero:'',
       Fecha:'',
       Hora:'',
       Tratamiento:'' 
    })
    const insertar = e =>{
        setCita({
            ...Cita,
            [e.target.name]:e.target.value
        })
    }
    const temporizador=setInterval(()=>{
        console.log(new Date().toLocaleTimeString());
    },10000);
    const handleSubmit=()=>{
        swal({
            text: "Formulario Registrado",
            icon: "success",
            //button: "OK"
        })
        temporizador();
        const requestInit = {
            method: 'POST',
            headers:{'Content-Type':'application/json'},
            body: JSON.stringify(Cita)
        }
        fetch("http://localhost:3001/api",requestInit)
        .then(res=> res.json)
        .then(res=> console.log(res));  

        setCita({
            Nombre:'',
            Correo:'',
            Telefono:'',
            Celular:'',
            Genero:'',
            Fecha:'',
            Hora:'',
            Tratamiento:'' 
        })
    }
    return(
        <div>
        <div className='main-F'>
                <form className='Formulario' onSubmit={handleSubmit}>
                         <legend className='formu'>Formulario</legend>
                            <div className="nombre">
                                <label>Nombre</label>
                                <input
                                    id="nombre"
                                    name="Nombre"
                                    type="text"
                                    className="form-control" 
                                    placeholder="Ingrese Nombre"
                                    onChange={insertar}
                                    required
                                />
                            </div>
                            
                            <div className="correo">
                                <label>Ingrese su Correo</label>
                                <input 
                                 id="correo"
                                 name="Correo"
                                 type="email"
                                 className="form-control" 
                                 placeholder="Ingrese Correo"
                                 onChange={insertar}
                                 required
                                 />
                            </div>

                            <div className="numT">
                                <label>Numero de Telefono</label>
                                <input
                                 id="numT"
                                name="Telefono"
                                 type="text"
                                 className="form-control"
                                 onChange={insertar}
                                 placeholder="Ingrese su Telefono"
                                 required
                                 />
                            </div>
                            <div className="numCel">
                                <label>Numero de Celular</label>
                                <input
                                id="numCel"
                                 name="Celular"
                                 type="text" 
                                 className="form-control" 
                                 placeholder="Ingrese Numero de Celular"
                                 onChange={insertar}
                                 required
                                 />
                            </div>
                            <div className="generoS">
                                <label className='cero'>Genero</label>
                                <div className='uno'>
                                    Maculino:<input 
                                    type="radio" 
                                    name="Genero" 
                                    value="masculino"
                                    onChange={insertar}
                                    required
                                    /><br/>
                                </div>
                                <div className='dos'>
                                    Femenino: <input 
                                    type="radio" 
                                    name="Genero" 
                                    value="Femenino"
                                    onChange={insertar}
                                    required
                                    /><br/>
                                </div>
                                <div className='tres'>
                                    Otros: <input 
                                    type="radio" 
                                    name="Genero" 
                                    value="Otros"
                                    onChange={insertar}
                                    required
                                    /><br/>
                                </div>
                            </div>
                            <div className="fecha">
                                <label>Seleccione fecha y Hora</label>
                                <div className='caja-fecha-hora'>
                                <div className='fechaC'>
                                    <input 
                                    name="Fecha"
                                    type="date" 
                                    className="form-control" 
                                    onChange={insertar}
                                    required
                                    />
                                </div>
                                <div className='hora'>
                                    <input 
                                    name="Hora"
                                    type="Time" 
                                    className="form-control" 
                                    onChange={insertar}
                                    required
                                    />
                                </div>
                                </div>     
                            </div>

                            <div className="selec">
                                <label>Seleccione Tratamiento</label>
                                <select name="Tratamiento" className="form-select" id="selec" onChange={insertar}>
                                    <option>TRATAMIENTO COSMETICO FACIAL</option>
                                    <option>TRATAMIENTO CORPORAL PARA AFITMAR Y MODEAR CUERPO</option>
                                    <option>DEPILACION</option>
                                    <option>MASAJES</option>
                                    <option>MAQUILLAJE FACIL Y CORPORAL</option>
                                    <option>APARATOLOGIA ESTETICA</option>
                                    <option>MANICURA Y PEDICURA</option>
                                    <option>ACESORIA DE IMAGEN</option>
                                </select>
                            </div>
                            <button  className='boton' type="submit" className="btn btn-primary">Submit</button>
                </form>
                <div className='Mapa'>
                        <img src={url} className="imagenIndex3"/>
                </div>
        </div>
        <footer className="footer">
         <div className="contenedor">
             Centro Estetico Integral LAEL &copy; 2021
         </div>
     </footer>
        </div>
    );
}
export default Formulario;