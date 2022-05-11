import React, { useState } from 'react';
import styled from 'styled-components'
import ArrowBack from '@mui/icons-material/ArrowBackIosNewOutlined';
import ArrowForward from '@mui/icons-material/ArrowForwardIosOutlined';
import {sliderItems} from '../data';
import { Link } from 'react-router-dom'

const Container = styled.div`
    width: 99vw;
    height: 100vh;
    display: flex;
    position: relative;
    overflow: hidden;
`;

const Arrow = styled.div`
    width: 50px;
    height: 50px;
    background-color: #fff7f7;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    bottom: 0;
    left: ${props=>props.direction === 'back' && "10px"};
    right: ${props=>props.direction === 'forward' && "10px"};
    margin: auto;
    opacity: 0.5;
    z-index: 2;
`;

const Wrapper = styled.div`
    height: 100%;
    display: flex;
    transition: all 0.5s ease-in;
    transform: translateX(${props=>props.slideIndex * -100}vw);
`;
const Slide = styled.div`
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    background-color: #${props=>props.bg}
`;
const ImageContainer = styled.div`
    height: 100%;
    flex: 1
 
`;

const Image = styled.img`
    height: 80%;
    margin: 10% 20%;
`;

const InfoContainer = styled.div`
    flex: 1;
    padding: 100px;
`;

const Title = styled.h1`
    font-size: 80px;
`;

const Description = styled.p`
    margin: 50px 0px;
    font-size: 20px;
    font-weight: 500;
    letter-spacing: 3px;
    
`;
const Button = styled.button`
    padding: 10px;
    font-size: 20px;
    background-color: transparent;
    cursor: pointer;
    letter-spacing: 2px;
`;


const Slider = () => {

    const [slideIndex, setSlideIndex] = useState(0);

    const handleClick = (direction) => {
        if(direction === 'back'){
            setSlideIndex(slideIndex > 0 ? slideIndex - 1 : 2);
        }else{
            setSlideIndex(slideIndex < 2 ? slideIndex + 1 : 0);
        }
    }
    
    return (
        <Container>
            <Arrow direction="back" onClick={()=>handleClick("back")}>
                <ArrowBack/>
            </Arrow>

            <Wrapper slideIndex={slideIndex}>
                {sliderItems.map(item=>(
                    <Slide bg = {item.bg} key={item.id}>
                        <ImageContainer>
                            <Image src = {item.img}/>
                        </ImageContainer>
                        <InfoContainer>
                            <Title>{item.title}</Title>
                            <Description>{item.desc}</Description>
                            <Link to='/Products/sportswear'><Button>COMPRA AHORA</Button></Link>
                        </InfoContainer>
                    </Slide>
                ))}
            </Wrapper>

            <Arrow direction="forward" onClick={()=>handleClick("forward")}>
                <ArrowForward/>
            </Arrow>
        </Container>
    )
}



export default Slider
