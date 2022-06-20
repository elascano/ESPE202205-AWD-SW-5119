import React from "react";
import Image from "next/image";
import carusel1 from "src/utils/images/Carousel_1.png"
import carusel2 from "src/utils/images/Carousel_2.png"
import carusel3 from "src/utils/images/Carousel_3.png"

interface PathImage {
    path: string;
}

function News() {

    return (
        <div id="news-container">
            <h2 id="news-title">Conoce Las Últimas Noticias Y Novedades</h2>
            <div id="news">

                <button className="news__btn">&lt;</button>
                <div className="new">
                    <label>Conoce Más Aquí</label>
                    <Image className="new__img" src={carusel1} alt="/"/>
                </div>
                <div className="new">
                    <label>Conoce Más Aquí</label>
                    <Image className="new__img" src={carusel2} alt="/"/>
                </div>
                <div className="new">
                    <label>Conoce Más Aquí</label>
                    <Image className="new__img" src={carusel3} alt="/"/>
                </div>
                <button className="news__btn">&gt;</button>
            </div>
        </div>
    );
}

export default News;