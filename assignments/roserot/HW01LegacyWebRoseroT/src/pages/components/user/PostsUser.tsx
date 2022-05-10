import React from "react";
import Image from "next/image";
import { useRouter } from "next/router";
import img1 from 'src/utils/images/gris.jpg'
import { Posts } from "src/interfaces/Posts";

interface Props {
    posts: Posts[];
}

export const PostsUser = ({ posts = [] }: Props) => {
    const router = useRouter();
    return (
        <div id="board-publication">
            <div className="publication">
            <Image id="publication__img" src={img1} alt=""/>
            <h3 id="publication__h3">{posts[0].titulo}</h3>
            <p id="publication__description">{new Date(posts[0].fecha_publicacion).toLocaleDateString()}</p>
        </div>
        <div className="publication">
            <Image id="publication__img" src={img1} alt=""/>
            <h3 id="publication__h3">{posts[1].titulo}</h3>
            <p id="publication__description">{new Date(posts[1].fecha_publicacion).toLocaleDateString()}</p>
        </div>
        <div className="publication">
            <Image id="publication__img" src={img1} alt=""/>
            <h3 id="publication__h3">{posts[2].titulo}</h3>
            <p id="publication__description">{new Date(posts[2].fecha_publicacion).toLocaleDateString()}</p>
        </div>
        <div className="publication">
            <Image id="publication__img" src={img1} alt=""/>
            <h3 id="publication__h3">{posts[3].titulo}</h3>
            <p id="publication__description">{new Date(posts[3].fecha_publicacion).toLocaleDateString()}</p>
        </div>
        </div>
    );
}

export default PostsUser;
