import React from 'react'
import { Link} from "react-router-dom";
import "./Navbar.css"

const Navbar = () => {
    return (
        <nav className="navbar">
            <h1 className="logo">RoomysCheese</h1>
            <ul className="nav-links">
                <Link to="/" className="home">
                     <li>Inicio</li>
                </Link>
                <Link to="/contact" className="contact">
                     <li>Productos</li>
                </Link>
                <Link to="/helados" className="helados">
                     <li>Menú</li>
                </Link>
                <Link to="/about" className="about">
                     <li>Sobre Nosotros</li>
                </Link>
                
            </ul>
        </nav>
    )
}

export default Navbar
