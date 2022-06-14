import React, {useState,useEffect} from 'react';
function Tabla(){
    const[CitaT,setCitaT]=useState([]);
     useEffect(()=>{
         const getCliente=()=>{
            fetch("http://localhost:3001/api")
            .then(res => res.json())
            .then(res => setCitaT(res))
         }
         getCliente();
     },[])
     const handleDelete = id => {
        const requestInit = {
            method: 'DELETE'
        }
        fetch('http://localhost:3001/api/' + id, requestInit)
        .then(res => res.text())
        .then(res => console.log(res))
    }
     const dividir=fecha=>{
            let fech;
            fech=fecha.split('T');
            return fech[0];
     }
     const UPPER=palabra=>{
        return palabra.toUpperCase();
 }
    return(
        <table className='table'>
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tipo de cita</th>
                    </tr>
            </thead>
            <tbody>
                {CitaT.map(CitaT => (
                    <tr key={CitaT.id}>
                        <td>{CitaT.id}</td>
                        <td>{CitaT.Nombre}</td>
                        <td>{dividir(CitaT.Fecha)}</td>
                        <td>{CitaT.Hora}</td>
                        <td>{UPPER(CitaT.Tratamiento)}</td>
                        <td>
                            <div className="mb-3">
                                <button onClick={() => handleDelete(CitaT.id)} className="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                ))}
            </tbody>
        </table>
       );
}
export default Tabla;