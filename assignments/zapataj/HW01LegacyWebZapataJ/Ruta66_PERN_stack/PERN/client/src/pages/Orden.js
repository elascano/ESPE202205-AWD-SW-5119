import React from 'react';
import { useCart } from 'react-use-cart';
const Orden = () => {
const {
    isEmpty,
    totalUniqueItems,
    items,
    totalItems,
    cartTotal,
    updateItemQuantity,
    removeItem,
    emptyCart,
}=useCart();
if(isEmpty) return <h1 className='text-center'>Tu Orden esta Vacía</h1>    
return (
    <section className=' py-4 container'>
        <div className='row justify-content-center'>
            <div className='col-12'>
                <h4> N° Orden ({totalUniqueItems})</h4>
                <table className='table table-light table-hover m-0'>
                <tbody>
                {items.map((item,index)=>{
                    return(
                    <tr key={index}>
                        <td>
                            <img src={item.img} style={{height:'5rem'}}/>
                        </td>
                        <td>{item.title}</td>
                        <td>{item.price}</td>
                        <td>{item.quantity}</td>
                        <button className='btn btn-info ms-2'
                        onClick={()=>updateItemQuantity(item.id, item.quantity+1)}>+</button>
                        <button className='btn btn-info ms-2'
                        onClick={()=>updateItemQuantity(item.id, item.quantity-1)}>-</button>
                        <button className='btn btn-outline-danger ms-2'
                        onClick={()=>removeItem(item.id)}>Eliminar</button>
                    </tr>)
                })}</tbody>
                </table>
            </div>
<div className='col-auto ms-auto'>
    <h2>Precio Total:${cartTotal}</h2>
</div>
<div className='col-auto'>
    <button className='btn btn-danger' onClick={()=>emptyCart()}>
        Vaciar
    </button>
    <button type="button" className="btn btn-primary" data-toggle="modal" data-target="#ModalCliente" >Ordenar</button>

</div>
        </div>
    </section>
    );
};

export default Orden;