import React, {useEffect} from 'react'
import {getCartItems} from '../data';
import {supabase} from '../supabaseClient'
import styled from 'styled-components'

function getTotalPrice(items){
    let totalPrice = 0;

    items.forEach(item => totalPrice += item.price*item.quantity);
    return totalPrice;
}

const Container = styled.div`
    width: 100%;

    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #191919;
    color: #C7D6D5;
  
`;

const Wrapper = styled.div`
    width: 100%;
    padding: 5vw;
    white-space: nowrap;    

`
const InfoContainer = styled.div`
    display: flex;
    align-items: center;
    justify-content: space-between;
    text-align: center;
`;
const Title = styled.h3`
    font-size: 20px;
`;
const TitleGeneral = styled.h1`
    text-align: center;
    font-size: 50px;
    margin-top: 0px;
`;
const Total = styled.h1`
    font-size: 40px;
    text-align: center;
    margin-bottom: 30px
`;
const Price = styled.span`
    font-size: 20px
`;


const PriceTotal = ({cartItems}) => {
    
    let totalPrice = getTotalPrice(cartItems)

    return (
        <Container>
            <Wrapper>
                <TitleGeneral>RECIBO</TitleGeneral>
                <InfoContainer>
                    <Title>SUBTOTAL: </Title> 
                    <Price>${(Math.round(totalPrice* 100) / 100).toFixed(2)}</Price>
                </InfoContainer>
                <InfoContainer>
                    <Title>COSTO DE ENTREGA: </Title> 
                    <Price>${totalPrice > 0 ? 2.00 : 0.00}</Price>
                </InfoContainer>
                
                <Total>TOTAL: ${totalPrice > 0 ? (Math.round((totalPrice + 2)* 100) / 100).toFixed(2) : 0.00}</Total>
            </Wrapper> 
        </Container>
    )
}

export default PriceTotal
