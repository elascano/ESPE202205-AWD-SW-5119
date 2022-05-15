import React from 'react'
import { Link } from 'react-router-dom'
import styled from 'styled-components'

const Container = styled.div`
    flex: 1;
    margin: 10px;
    height: 70vh;
    position: relative;
`
const Image = styled.img`
    width: 100%;
    height: 100%;
    object-fit: cover;
`
const Info = styled.div`
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;  
    display: flex; 
    flex-direction: column;
    align-items: center;
    justify-content: center;
`
const Title = styled.h1`
    color: white;
    margin: 20px;
    font-weight: extra-bold;
    font-size: 4vw;
    padding: 10px 20px;
    text-align: center;
    background-color: rgba(0,0,0,0.3);
`
const Button = styled.button`
    border: none;
    padding: 10px;
    background-color: #C7D6D5;
    color: #191919;
    cursor: pointer;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease-in;

    &:hover {
        background-color: #191919;
        color: #C7D6D5;
    }
`

const CategoryItem = ({c}) => {

    return (
        <Container>
            <Image src={c.img}/>
            <Info>
                <Title>{c.title}</Title>
                <Link to= {`/Products/${c.id}`} ><Button>COMPRA AHORA</Button></Link>
            </Info>
        </Container>
    )
}


export default CategoryItem
