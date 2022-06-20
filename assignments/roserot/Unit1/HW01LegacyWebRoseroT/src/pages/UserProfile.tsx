import React, { useState } from "react";
import Image from "next/image";
import { getCookie } from 'cookies-next';

import HomepageHeader from "./components/homepage/HomepageHeader";
import HomepageFooter from "./components/homepage/HomepageFooter";
import PostsUser from "./components/user/PostsUser";
import { Posts } from "../../src/interfaces/Posts";
import { usuarios } from "src/interfaces/usuarios";

import userLogo from "src/utils/logos/pngwing.com.png"
import imgBkg from "src/utils/images/user-bkg.jpg"
import { GetServerSideProps } from "next";
import Id_usuarios from "./api/post/[id_usuarios]";

interface Props {
    posts: Posts[];
}

export const getServerSideProps: GetServerSideProps = async (context) => {
    const res = await fetch("http://localhost:3000/api/post");
    const posts = await res.json();
    console.log(posts);
    return {
        props: { posts },
    };
};

function User({posts}: Props) {
    const [show, setShow] = useState('none');
    return (
        <div>
            <HomepageHeader />
            <Image id='img-bkg' src={imgBkg} alt='' />
            <div id='user__container'>
                <div id='user__data'>
                    <Image id='user__img' src={userLogo} alt='' />
                    <label className='user__lbl'>{getCookie("user")}</label>
                    <label className='user__lbl'>{getCookie("user") + "@espe.email.ec"}</label>
                    <button onClick={() => setShow('')}>Editar Perfil</button>
                    {/* <EditUser show=' ' /> */}
                </div>
                <div id='user__activity'>
                    <label className='user__lbl'>Comentarios: #</label>
                    <label className='user__lbl'>Preguntas: #</label>
                    <h3 id='user__h3'>Publicaciones activas</h3>
                    <PostsUser posts={posts}/>
                    {/* <button className='user__btn'>ver más</button> */}
                </div>
            </div>
            <HomepageFooter />
        </div>
    );
}

export default User;