import React from 'react'
import styled from 'styled-components'
import Product from './Product'

const Container = styled.div`
    padding: 20px;
    width: 97vw;
    display:grid;
    grid-template-columns: repeat(4, 1fr);
`
const Products = ({products, update}) => {

    return (
        <Container>
            {products.map(product =>
                <Product product={product} key={product.id} update={()=>update()}/>
            )}
        </Container>
    )
}

export default Products
