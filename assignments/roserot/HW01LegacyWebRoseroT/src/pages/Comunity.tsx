import { GetServerSideProps } from "next";
import { Posts } from "../../src/interfaces/Posts";
import HomepageHeader from '../pages/components/homepage/HomepageHeader';
import HomepageFooter from '../pages/components/homepage/HomepageFooter';
import { CommunityPosts } from "../pages/components/comunity/ComunnityPosts";

interface Props {
    posts: Posts[];
}

export default function community({ posts }: Props) {
    return (
        <>
            <HomepageHeader />
            {posts.length === 0 ? (
                <h1>no post</h1>
            ) : (
                <CommunityPosts posts={posts} />
            )}
            <HomepageFooter />
        </>
    )
}

export const getServerSideProps: GetServerSideProps = async (context) => {
    const res = await fetch("http://localhost:3000/api/post");
    const posts = await res.json();
    console.log(posts);
    return {
        props: { posts: posts, },
    };
};