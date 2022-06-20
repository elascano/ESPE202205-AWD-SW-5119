import React from 'react';

function Copyright(){
    return (
        <div id="copyright">
            <h3 id='copyright__title'>Copyright</h3>
            <p id='copyright__p'>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip Ex Ea Commodo Consequat.</p>
        </div>
    );
}

function SocialNetworks(){
    return (
        <div id='social-networks'>
            <h3 id='social-networks__title'>Síguenos En Nuestras Redes</h3>
            <div id='social-networks__items'>
                <a className='social-networks__lbl' href='https://www.facebook.com/'>Facebook</a>
                <a className='social-networks__lbl' href='https://www.Instagram.com/'>Instagram</a>
                <a className='social-networks__lbl' href='https://www.Twitter.com/'>Twitter</a>
            </div>
        </div>
    );
}

function MoreInformation(){
    return (
        <div id='more-information'>
            <h3 id='more-information__title'>Más Información</h3>
            <div id='more-information__items'>
                <div>
                    {/* <img className='more-information__img' src={'/'} alt='/'></img> */}
                    <label id='more-information__lbl'>123-123-123</label>
                </div>
                <div>
                    {/* <img className='more-information__img' src={'/'} alt='/'></img> */}
                    <p className='more-information__p'>Correoejemplo@Gmail.com<br/>Correoejemplo2@Gmail.com</p>
                </div>
                <div>
                    {/* <img className='more-information__img' src={'/'} alt='/'></img> */}
                    <p className='more-information__p'>Sangolqui, Ecuador<br/>062 123 123</p>
                </div>
            </div>
        </div>
    );
}

function HomepageFooter(){
    return (
        <footer>
            <div id='information-container'>
                <Copyright />
                <SocialNetworks />
                <MoreInformation />
            </div>
            <p id='copyright-p'>&copy, copyright @2021</p>
        </footer>
    );
}

export default HomepageFooter;