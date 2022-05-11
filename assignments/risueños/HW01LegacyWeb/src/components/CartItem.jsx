import React, {useEffect} from 'react'
import styled from 'styled-components'
import RemoveIcon from '@mui/icons-material/Remove';
import {Link} from "react-router-dom";
import AddIcon from '@mui/icons-material/Add';

const Wrapper = styled.div`
    width: 95%;
    display: flex;
    margin: 20px 0px;
    margin-left: 30px;
    align-items: center;
    justify-content: space-between;
`

const Container = styled.div`
    display: flex;
    width: 100%;
    align-items: center;
`

const ImageContainer = styled.img`
   width: 8vw;
   height: auto;
   margin-right: 40px;
`
const InfoContainer = styled.div`
  width: 50%;

`
const Name = styled.h1`
    font-size: 30px;
    margin: 0px;
    font-weight: 800;
`
const Desc = styled.p`
    margin: 0px;
`
const Price = styled.span`
    font-size: 30px;
   
    font-weight: 600;
    text-align: center;
`

const Icon = styled.div`
    color: white;
    width: 1.5vw;
    height: 1.5vw;
    border-radius: 50%;
    background-color: #191919;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease-in;   
    margin-right: 30px;
    cursor: pointer;

    &:hover{
        color: red;
        background-color: white;
    }
`

const StyledLink = styled(Link)`
    text-decoration: none;
    color: #191919;
    display: flex;
    align-items: center;
    &:focus, &:hover, &:visited, &:link, &:active {
        text-decoration: none;
    }
`;

const AmountIcon = styled.div`
    cursor: pointer;
`

const AmountContainer= styled.div`
    display: flex;
    align-items: center;
    font-weight: 700;
    text-align: center;
`
const Amount = styled.span`
    width: 30px;
    height: 30px;
    border-radius: 10px;
    border: 1px solid #C7D6D5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0px 5px;
`

const EditableContainer = styled.div`
   display: flex;
   flex-direction: column;
   align-items: flex-end;
   text-align: center;
   
`
const PriceContainer = styled.div`
    
    align-self: center;
`



const CartItem = ({product, products,deleteItem}) => {

    return (
        <Wrapper>
            <Container>
                <Icon onClick={deleteItem}>
                    <RemoveIcon/>
                </Icon>
                <StyledLink to={'/SingleProduct/'+(product.id_product)}>
                    <ImageContainer src={product.img}/>
                    <InfoContainer>
                        <Name>{product.name}</Name>
                        <Desc>Size: {product.size}<br/>Price: ${product.price}</Desc>
                    </InfoContainer>
                </StyledLink>
                
            </Container>
            
            <EditableContainer>
                <AmountContainer>
                    
                        <Amount>{product.quantity}</Amount>
                    
                </AmountContainer>
                <PriceContainer>
                    <Price>${(Math.round(product.price*product.quantity* 100) / 100).toFixed(2)}</Price>
                </PriceContainer>
            </EditableContainer>
            
        </Wrapper>
    )
}

export default CartItem
