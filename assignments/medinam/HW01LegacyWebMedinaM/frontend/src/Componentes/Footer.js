import '../Estilos CSS/footer.css'
import { NavLink } from 'react-router-dom'

const Footer = () =>  (
        <footer className="footer-distributed">
            <div className="footer-left">
                <h3><span>HAMA</span></h3>
                <p className="footer-links">
                    <NavLink to='/' className="link-1">Home</NavLink>
                    <NavLink to='/iniciar'>Inicio</NavLink>
                    <NavLink to='/conocenos'>Conócenos</NavLink>
                </p>
                <p className="footer-company-name">HAMA © 2022</p>
            </div>
            <div className="footer-center">
                <div>
                    <i className="fa fa-envelope"></i>
                    <p><NavLink to='/'>macantuna1@espe.edu.ec</NavLink></p>
                </div>
                <div>
                    <i className="fa fa-envelope"></i>
                    <p><NavLink to='/'>mamedina13@espe.edu.ec</NavLink></p>
                </div>
                <div>
                    <i className="fa fa-envelope"></i>
                    <p><NavLink to='/'>hdperez@espe.edu.ec</NavLink></p>
                </div>

                <div>
                    <i className="fa fa-envelope"></i>
                    <p><NavLink to='/'>agvalarezo1@espe.edu.ec</NavLink></p>
                </div>
            </div>
            <div className="footer-right">
                <p className="footer-company-about">
                    <span>Sobre HAMA</span>
                    Organiza todas tus actividades de una forma eficiente y ágil para acceder a ellas en todo lugar y momento.
                </p>
                <div className="footer-icons">
                    <a href="https://es-la.facebook.com/"><i className="fab fa-facebook"></i></a>
                    <a href="https://github.com/Martin0017/proyecto-web-react"><i className="fab fa-github"></i></a>
                </div>
            </div>
        </footer>
    )


export default Footer