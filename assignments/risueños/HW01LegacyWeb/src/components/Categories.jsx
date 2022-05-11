import React, {useEffect} from 'react'
import styled from 'styled-components'
import CategoryItem from './CategoryItem'
import {getCategoriesList} from '../data'

const Container = styled.div`
    display:flex;
    padding: 20px;
    justify-content: space-between;
   
`


const Categories = () => {
    const [categoriesList, setCategoriesList] = React.useState([])
    
    useEffect(() =>{
        getCategoriesList(setCategoriesList)
    }, [])

    return (
        <Container>
            {categoriesList.map(c =>
                <CategoryItem c={c} key={c.id}/>    
            )}
        </Container>
    )
}

export default Categories
