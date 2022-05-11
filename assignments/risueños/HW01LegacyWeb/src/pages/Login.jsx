import React from 'react'
import Navbar from '../components/Navbar'
import LoginApp from '../components/LoginApp'
import styled from 'styled-components'

const FormContainer = styled.div`
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    margin-top: 30px;
`


export default function Login() {
  return (
    <div>
        <Navbar/>
        <FormContainer>
            <LoginApp />
        </FormContainer>
    </div>
  )
}
