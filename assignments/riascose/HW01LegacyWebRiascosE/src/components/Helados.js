import React from 'react'
import "./Helados.css"


const Helados = () => {
    return (
        <main>
        <h1>Sabores</h1>
        <div className="container__box">
            <div className="box">
                <i className="lni lni-amazon"></i>
                <img className="frutas" src="/img/cholate.jpg" alt="" />
                <h4>Chocolate</h4>
            </div>
            <div className="box">
                <i className="lni lni-spotify"></i>
                <img className="frutas" src="/img/coco.jpeg" alt="" />
                <h4>Coco</h4>
            </div>
            <div className="box">
                <i className="lni lni-app-store"></i>
                <img className="frutas" src="/img/fresa.jpg" alt="" />
                <h4>Fresa</h4>
            </div>
            <div className="box">
                <i className="lni lni-behance"></i>
                <img className="frutas" src="/img/maracuya.jpg" alt="" />
                <h4>Maracuya</h4>
            </div>
            <div className="box">
                <i className="lni lni-chrome"></i>
                <img className="frutas" src="/img/ron.jpg" alt="" />
                <h4>Ron Pasas</h4>
            </div>
            <div className="box">
                <i className="lni lni-css3"></i>
                <img className="frutas" src="/img/oreo.jpg" alt="" />
                <h4>Galleta</h4>
            </div>
            <div className="box">
                <i className="lni lni-html5"></i>
                <img className="frutas" src="/img/mortinio.jpg" alt="" />
                <h4>Mortiño</h4>
            </div>
            <div className="box">
                <i className="lni lni-github"></i>
                <img className="frutas"src="/img/menta.jpg" alt="" />
                <h4>Menta</h4>
            </div>
            
        </div>

    </main>
        
    )

}

export default Helados;

