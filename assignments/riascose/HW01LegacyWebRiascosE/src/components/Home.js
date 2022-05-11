import React from 'react'
import "./Home.css"

const Home = () => {
    return (

        <><><><div className="logoIndex">
            <img className="logoIndex" src="/img/logoIndex.png" alt="" />
        </div>

            <div className="fondoIndex">

            </div></><section className="section">
                <div className="divlogoIndex">
                    <img className="imagenlogoIndex" src="/img/imagenlogoIndex.png" alt="" />
                </div>
            </section></>
            
            <footer>
                <div className="container-footer-all">

                    <div className="container-body">

                        <div className="colum1">
                            <h1>Mas informacion de la compañia</h1>

                            <p>Esta compañia se dedica a brindar una experiencia más amena y permitir a
                                los clientes ordenar desde la comodidad de su casa el helado que sea de su preferencia y
                                para cualquier cantidad de personas siguiendo el mismo proceso de compra con la única diferencia que 
                                lo hace via online.</p>


                        </div>

                        <div className="colum2">

                            <h1>Redes Sociales</h1>

                            <div className="row">
                                <img src="/img/icon/facebook.png"></img>

                                <label>Siguenos en Facebook</label>
                            </div>
                            <div className="row">
                                <img src="/img/icon/twitter.png"></img>
                                <label>Siguenos en Twitter</label>
                            </div>
                            <div className="row">
                                <img src="/img/icon/instagram.png"></img>
                                <label>Siguenos en Instagram</label>
                            </div>
                            <div className="row">
                                <img src="/img/icon/google-plus.png"></img>
                                <label>Siguenos en Google Plus</label>
                            </div>
                            <div className="row">
                                <img src="/img/icon/pinterest.png"></img>
                                <label>Siguenos en Pinteres</label>
                            </div>


                        </div>

                        <div className="colum3">

                            <h1>Informacion Contactos</h1>

                            <div className="row2">
                                <img src="/img/icon/house.png"></img>
                                <label>La Romana,
                                    Machachi</label>
                            </div>

                            <div className="row2">
                                <img src="/img/icon/smartphone.png"></img>
                                <label>+1-829-395-2064</label>
                            </div>

                            <div className="row2">
                                <img src="/img/icon/contact.png"></img>
                                <label>blaa030@gmail.com</label>
                            </div>

                        </div>

                    </div>

                </div>

                <div className="container-footer">
                    <div className="footer">
                        <div className="copyright">
                            © 2022 Todos los Derechos Reservados | <a href="">RoomysCheese</a>
                        </div>

                        <div className="information">
                            <a href="">Informacion Compañia</a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
                        </div>
                    </div>

                </div></footer></>
        

    )
}

export default Home
