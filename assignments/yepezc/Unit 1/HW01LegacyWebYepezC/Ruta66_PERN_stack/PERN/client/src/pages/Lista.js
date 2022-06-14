import React from 'react';
import {Link} from 'react-router-dom'
import Platos from './Platos';
import data from './data';


const Lista=()=> {
  return ( <>
    <section className="cabeza4">
        <nav>
        <Link to='/'><img src="imagenes/logo.png" /></Link>
          <div className="links"> 
            <ul> 
            <li><Link to='/reser'>Reservaciones</Link></li>  
            <li><Link to='/menu'>Menu</Link></li>
            <li><Link to='/info'>Promociones</Link></li></ul>
          </div>
        </nav>
        <div className="mensaje">
          <h1>-Menú-</h1>
        </div>
    </section>
    <section className='text-center  mt-3 py-4 container'>   
      <div className='row justify-content-center'>
        {data.productData.map((item,index)=>
        {
          return(<Platos 
            img={item.img}  
            title={item.title}
              price={item.price} 
              key={index} 
              item={item}/>)
        })} 
      </div>  
              
      <div className="modal fade" id="ModalCliente" tabIndex={-1} role="dialog" aria-labelledby="DatosCliente" aria-hidden="true">
      <div className="modal-dialog" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="DatosCliente">Datos de Cliente</h5>
            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">x</span>
            </button>
          </div>
          <div className="modal-body">
            <form>
            <div className="container-fluid">
              <div className="row">
                <div className="col-md-6 form-group">              
                  <label htmlFor="client-name" className="col-form-label">Nombre</label>
                  <input type="text" className="form-control" id="client-name" />                   
                </div>
                <div className="col-md-6 ml-auto form-group">                    
                  <label htmlFor="client-lastname" className="col-form-label">Apellido </label>
                  <input type="text" className="form-control" id="client-lastname" />                    
                </div>
              </div>
              <div className="row">
                <div className="col-md-12 ml-auto form-group">
                  <label htmlFor="client-direction" className="col-form-label">Direccion </label>
                  <input type="text" className="form-control" id="client-direction" />
                </div>              
              </div>
              <div className="row">
                <div className="form-group col-md-12 ml-auto">  
                    <label htmlFor="client-mail" className="col-form-label">E-mail </label>
                    <input type="email" className="form-control" id="client-mail" />   
                </div>
              </div>
              <div className="row">
                <div className="col-md-8 form-group">                  
                  <label for="pagoSelect">Tipo de Pago</label>
                  <select id="pagoSelect" class="form-control">
                    <option value="" selected>Escoge...</option>
                    <option value="1">Tarjeta</option>
                    <option value="2">Efectivo</option>
                    <option value="3">Otra</option>
                  </select>
                  <input type="text" className="form-control" id="otro-pago"/>                                      
                </div>
              </div>
              <div className="row">
                <div className="form-group col-md-8 ">  
                    <label htmlFor="client-number" className="col-form-label">Numero de Telefono</label>
                    <input type="text" className="form-control" id="client-number" />   
                </div>
              </div>
              <div className="row">
                 <div className="form-group col-md-12 ml-auto">  
                    <label htmlFor="client-comment" className="col-form-label">Comentario de Pedido</label>
                    <textarea type="text" className="form-control" id="client-comment" />   
                 </div>
              </div>  
            </div>            
            </form>
          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" className="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
  </section> 
</>
)}

/*$('#pagoSelect').change(function (e) {
  if ($(this).val() === "3") {
    $('#otro-pago').prop("disabled", false);
    $('#otro-pago').show();
  } else {
    $('#otro-pago').prop("disabled", true);
    $('#otro-pago').hide();
  }
});*/

export default Lista;