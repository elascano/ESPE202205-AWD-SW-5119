import React from 'react'
import styled from 'styled-components'
import Navbar from '../components/Navbar'
import Products from '../components/Products'
import Footer from '../components/Footer'

const Container = styled.div`
    
`
const Title = styled.h1`
    margin: 20px;
    font-size: 100px;
`
const FilterContainer = styled.div`
    display: flex;
    justify-content: space-between;
`
const Filter = styled.div`
    margin: 20px;
    
`
const FilterText = styled.span`
    font-size: 20px;
    font-weight: 600;
    margin-right: 20px;
`
const Select = styled.select`
    padding: 10px;
    margin-right: 20px;
`
const Option = styled.option`
    
`

const ProductList = ({products, title}) => {
    const [state, updateState] = React.useState();
    const forceUpdate = React.useCallback(() => updateState({}), []);

    const onUpdate = () => {
        forceUpdate();
    }

    return (
        <Container>
            <Navbar/>
            <Title>{title}</Title>
            
            <Products products={products}
                      update={()=>onUpdate()}/>
            <Footer/>
        </Container>
    )
}

export default ProductList
