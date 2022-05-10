import React from 'react';
import Link from 'next/link';
import Image from 'next/image'
import logo from 'src/utils/logos/profile.png'

function HomepageHeader() {
    return (
        <header>
            <nav>
                <ul id='nav-list'>
                    <li className='nav__link'>
                        <Link href="/HomePage">
                            <a>Inicio</a>
                        </Link>
                    </li>
                    <li className='nav__link'>
                        <Link href='/HomePage#news-container'>Noticias</Link>
                    </li>
                    <li className='nav__link'>
                        <Link href="/UserProfile" passHref>
                            <a><Image className='nav__logo' src={logo} alt='/'
                                width={'50'} height={'50'} /></a>
                        </Link>
                    </li>
                    <li className='nav__link'>
                        <Link href="/Comunity">
                            <a>Comunidad</a>
                        </Link>
                    </li>
                    <li className='nav__link'>
                        <Link href="/Blog">
                            <a>Blog</a>
                        </Link>
                    </li>
                </ul>
            </nav>
            <label id='darkmode-btn'>
                <input id='darkmode__in' type="checkbox"></input>
                <span id='darkmode__check'></span>
            </label>
        </header>
    );
}

export default HomepageHeader;