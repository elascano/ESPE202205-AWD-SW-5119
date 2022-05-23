import React, {useEffect} from 'react'
import Navbar from '../components/Navbar'
import Slider from '../components/Slider';
import Categories from '../components/Categories';
import Products from '../components/Products';
import styled from 'styled-components'
import Footer from '../components/Footer'
import {getProducts} from '../data'

const Title = styled.h1`
    text-align: center;
    font-weight: 1000;
    font-size: 100px;
    margin-top: 30px;
`;

const Container = styled.div`
    overflow: hidden;
`

const Home = () => {
    const [state, updateState] = React.useState();
    const [popularProducts, setPopularProducts] = React.useState([]);
    const forceUpdate = React.useCallback(() => updateState({}), []);

    useEffect(() =>{
        getProducts("popular", setPopularProducts)
    }, [])

    const onUpdate = () => {
        forceUpdate();
    }

    return (
        <Container>
            <Navbar />
            <Slider/>
            <Categories/>
            <Title>PRODUCTOS POPULARES</Title>
            <Products products={popularProducts}
                      update={onUpdate}/>
            <Footer/>
        </Container>
    );
}

export default Home

