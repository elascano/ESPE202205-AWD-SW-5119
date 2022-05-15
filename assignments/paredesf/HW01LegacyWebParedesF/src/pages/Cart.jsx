import React, {useState, useEffect} from 'react';
import Navbar from '../components/Navbar';
import Footer from '../components/Footer';
import styled from 'styled-components';
import CartItem from '../components/CartItem';
import {getCartItems, deleteCartItem, getProducts} from '../data';
import PriceTotal from '../components/PriceTotal'
import {supabase} from '../supabaseClient'

const Container = styled.div`

`;

const Wrapper = styled.div`
    display: flex;
    justify-content: space-between;
    min-height: 100vh;
`;

const ProductContainer = styled.div`
    flex: 2;
    padding: 0px 60px;
`
const PriceContainer = styled.div`
    flex: 1;
    padding: 50px;
    display: flex;
    justify-content: center;
    height: fit-content;
    align-items: center;
    flex-direction: column;
`
const Title = styled.h1`
    font-size: 50px;
    margin-bottom: 30px;
`

const Description = styled.div`
    display: flex;
    justify-content: space-between;
    padding-left: 270px;
    padding-right: 30px;
`;
const DescriptionItem = styled.p`
   
`;

const CartItemsContainer = styled.div`
    width: 100%;
`;

const Button = styled.button`
    width: 100%;
    margin: 20px 0px 0px;
    font-size: 30px;
    padding: 20px;
    background-color: transparent;
    transition: all 0.3s ease-in;
    cursor: pointer;
    &:hover{
        color: white;
        background-color: #191919;
    }
`;




const Cart = () => {
    const [cartData, setCartData] = useState([]);
    
    const [state, updateState] = React.useState();
    const forceUpdate = React.useCallback(() => updateState({}), []);
    const user = supabase.auth.user()

    useEffect(() =>{
        if(user){
            getCartItems(user.email, setCartData)
        }else{
            setCartData([])
        }

    },[user])



    const onDelete = (product) => {
        if(user){

            removeProductFromList(product);
            getCartItems(user.email, setCartData)
            forceUpdate();
        }
    }

    const removeProductFromList = (product) => {
        deleteCartItem(product.id_transaction)
    } 


    return (
        <Container>
            <Navbar/>
            <Wrapper>
                <ProductContainer>
                    <Title>TU CARRITO</Title>
                    <CartItemsContainer>
                        <Description>
                            <DescriptionItem>
                                ITEM
                            </DescriptionItem>
                            <DescriptionItem>
                                SUBTOTAL
                            </DescriptionItem>
                        </Description>
                        {cartData.map(item => 
                            <CartItem product={item} key={item.id} deleteItem={() => onDelete(item)} />
                        )}
                    </CartItemsContainer>
                    
                </ProductContainer>
                <PriceContainer>
                    <PriceTotal cartItems = {cartData}/>
                    <Button>COMPLETAR ORDEN</Button>
                </PriceContainer>

                
            </Wrapper>
            <Footer />
        </Container>
    )
}


export default Cart
