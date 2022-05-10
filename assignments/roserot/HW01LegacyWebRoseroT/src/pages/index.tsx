import React from 'react'
import MyApp from './_app'
import HomePage from './HomePage'
import {usuarios} from 'src/interfaces/usuarios'

interface Props{
  usuarios:usuarios[]
}

export default function index()
{
  return(
    <div>
      <HomePage />
    </div>
  )
}