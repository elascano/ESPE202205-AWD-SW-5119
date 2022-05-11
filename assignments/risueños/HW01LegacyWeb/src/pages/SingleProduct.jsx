import React, { useState } from 'react'
import Navbar from '../components/Navbar'
import Footer from '../components/Footer'
import styled from 'styled-components'
import AddIcon from '@mui/icons-material/Add';
import RemoveIcon from '@mui/icons-material/Remove';
import {insertToCart, updateCart} from '../data';
import {supabase} from '../supabaseClient'

const Container = styled.div`
    
`
const Wrapper = styled.div`
    padding: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
`
const ImageContainer = styled.div`
    flex: 1;
`
const Image = styled.img`
    width: 100%;
    
`
const InfoContainer = styled.div`
    flex: 1;
    padding: 0px 50px;
`
const Title = styled.h1`
    font-weight: 200;
    margin: 20px 0px;
    font-size: 80px;
`
const Desc = styled.p`
   
`
const Price = styled.span`
    font-weight: 100;
    font-size: 40px;
    font-size: 50px;
`
const FilterContainer = styled.div`
    width: 50%;
    margin: 30px 0px;
    display: flex;
    justify-content: space-between;
`
const Filter = styled.div`
    display: flex;
    align-items: center;
`
const FilterTitle = styled.span`
    font-size: 20px;
    font-weight: 200;
`

const FilterSize = styled.select`
    margin-left: 10px;
    padding: 10px;
`
const FilterSizeOption= styled.option`
    
`
const AddContainer= styled.div`
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: space-between;
`
const AmountContainer= styled.div`
    display: flex;
    align-items: center;
    font-weight: 700;
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
const Button = styled.button`
    padding: 15px;
    boder: 2px solid #191919;
    background-color: white;
    cursor: pointer;
    font-weight: 500;

    &:hover{
        background-color: #C7D6D5;
    }
`

const Icon = styled.div`
    cursor: pointer;
`

const Product = ({product}) => {
    const [loading, setLoading] = useState(false);
    const [amount, setAmount] = useState(1);
    const [selectedValue, setSelectedValue] = useState('xs')
    const [state, updateState] = React.useState(0);
    const forceUpdate = React.useCallback(() => updateState({}), []);

    const handleClick = (simbol) => {
        if(simbol === '-' && amount > 1){
            setAmount(amount - 1);
        }else if (simbol === '+'){
            setAmount(amount + 1);
        }
    };



    const addItemToCart = (product, amount) => {
        setLoading(true)
        let item = JSON.parse(JSON.stringify(product));
        item.id = item.id;
        item.size = selectedValue; 
        item.amount = amount;
        
        insertToCart(item.id,supabase.auth.user().email,item.size, item.price, item.amount)
        setLoading(false)
    }

    return (
        <Container>
            <Navbar />
            <Wrapper>
                <ImageContainer>
                    <Image src={product.img}></Image>
                </ImageContainer>

                <InfoContainer>
                    <Title>{product.name}</Title>
                    <Desc>{product.description}</Desc>
                    <Price>${product.price}</Price>
                    <FilterContainer>
                        <Filter>
                            <FilterTitle>TAMAÑO</FilterTitle>
                            <FilterSize value={selectedValue} onChange={(e)=>setSelectedValue(e.target.value)} >
                                <FilterSizeOption value='xs'>XS</FilterSizeOption>
                                <FilterSizeOption value='s'>S</FilterSizeOption>
                                <FilterSizeOption value='m'>M</FilterSizeOption>
                                <FilterSizeOption value='l'>L</FilterSizeOption>
                                <FilterSizeOption value='xl'>XL</FilterSizeOption>
                            </FilterSize>
                        </Filter>
                    </FilterContainer>

                    <AddContainer>
                        <AmountContainer>
                            <Icon>
                                <RemoveIcon onClick={()=>handleClick('-')}/>
                            </Icon>
                            <Amount>{amount}</Amount>
                            <Icon>
                                <AddIcon onClick={()=>handleClick('+')}/>    
                            </Icon>
                        </AmountContainer>
                        <Button onClick={()=>addItemToCart(product, amount)} disabled={loading}>AGREGAR AL CARRITO</Button>
                    </AddContainer>
                </InfoContainer>

            </Wrapper>

            <Footer />
        </Container>
    )
}

export default Product
