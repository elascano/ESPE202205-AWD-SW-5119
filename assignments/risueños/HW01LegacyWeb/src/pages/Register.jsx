import React from 'react'
import Navbar from '../components/Navbar'
import RegisterApp from '../components/RegisterApp'
import styled from 'styled-components'

const FormContainer = styled.div`
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-top: 30px;
`



export default function Register() {
  return (
    <div>
        <Navbar/>
        <FormContainer>
            <RegisterApp />
        </FormContainer>
    </div>
  )
}
