import React from 'react'
import styled from 'styled-components'
import AddShoppingCartOutlinedIcon from '@mui/icons-material/AddShoppingCartOutlined';
import SearchOutlinedIcon from '@mui/icons-material/SearchOutlined';
import {Link} from "react-router-dom";
import { IconButton } from '@material-ui/core';
import {insertToCart, updateCart} from '../data';
import {supabase} from '../supabaseClient'

const Info = styled.div`
   opacity: 0;
   width: 100%;
   height: 100%;
   position: absolute;
   top: 0;
   left: 0;
   background-color: rgba(0,0,0,0.2);
   z-index: 3;
   display: flex;
   align-items: center;
   justify-content: center;
   transition: all 0.3s ease-in; 
   cursor: pointer;
`

const Container = styled.div`
    flex: 1;
    margin: 5px;
    min-width: 350px;
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;    

    &:hover ${Info}{
        opacity: 1;
    }
`

const Icon = styled.div`
   width: 40px;
   height: 40px;
   border-radius: 50%;
   background-color: white;
   display: flex;
   align-items: center;
   justify-content: center;
   margin: 10px;
   transition: all 0.1s ease-in;

   &:hover{product
        background-color: #C7D6D5;
        transform: scale(1.1);
   }
`
const Image = styled.img`
    height: 100%;
    width: 100%;
    z-index: 2;
    object-fit: cover;
`

const Product = ({product, update}) => {

    const addItemToCart = (product) => {
        let item = JSON.parse(JSON.stringify(product));
        item.id = `${item.id}`;
        item.size = 'm'; 
        item.amount = 1;
        
        insertToCart(item.id,supabase.auth.user().email,item.size, item.price, item.amount)
    }


    return (
        <Container>
            <Image src={product.img}/>
            <Info>
                <Icon onClick={()=>addItemToCart(product)}>
                    <AddShoppingCartOutlinedIcon/>
                </Icon>
                <Icon>
                    <IconButton component={Link} to={`/SingleProduct/${product.id}`}>
                        <SearchOutlinedIcon style={{color: "black"}}/>
                    </IconButton>
                </Icon>
                
            </Info>
        </Container>
    )
}

export default Product
