import React from "react";
import Link from 'next/link'
import Image from "next/image";
import portada from "src/utils/images/Portada_inicio.jpeg";
import logo from "src/utils/logos/Logo.png";


function Presentation() {
    return (
        <div id="presentation">
            <Image id="presentation-img" src={portada} alt=""/>
            <div id="presentation__item">
                <Image id="presentation-logo" src={logo} alt=""/>
                <Link href="/login"><a className="presentation__link">Saber Más</a></Link>
                <Link href="/register"><a className="presentation__link">Regístrarse</a></Link>
            </div>
        </div>
    );
}

export default Presentation;