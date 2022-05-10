import { useRouter } from "next/router";
// import { Card } from "semantic-ui-react";
import { Posts } from "src/interfaces/Posts";

interface Props {
  posts: Posts[];
}

export const CommunityPosts = ({ posts = [] }: Props) => {
  const router = useRouter();

  return (
    <div className="post-grid">
      {posts.map((post) => (
        <div className="post-container"
          onClick={() => router.push(`/posts/edit/${post.id_post}`)}
          key={post.id_post}
        >
          <div>
            <h3 className="post__title">{post.titulo}</h3>
            {post.fecha_publicacion && (
              <div className="post__date">
                {new Date(post.fecha_publicacion).toLocaleDateString()}
              </div>
            )}
            <p className="post__content">{post.contenido}</p>
          </div>
        </div>
      ))}
    </div>
  );
};

// export const CommunityPosts = ({ posts = [] }: Props) => {
//   const router = useRouter();

//   return (
//     <Card.Group itemsPerRow={4}>
//       {posts.map((post) => (
//         <Card
//           onClick={() => router.push(`/posts/edit/${post.id_post}`)}
//           key={post.id_post}
//         >
//           <Card.Content>
//             <Card.Header>{post.titulo}</Card.Header>
//             {post.fecha_publicacion && (
//               <Card.Meta>
//                 {new Date(post.fecha_publicacion).toLocaleDateString()}
//               </Card.Meta>
//             )}
//             <Card.Description>{post.contenido}</Card.Description>
//           </Card.Content>
//         </Card>
//       ))}
//     </Card.Group>
//   );
// };