import React from 'react';
import { CartProvider } from 'react-use-cart';
import Lista from './Lista';
import Orden from './Orden';
const Menu = () => {
  return (
    <>
      <CartProvider>
      <Lista/>
      <Orden/>
      </CartProvider>
    </>
  );
};

export default Menu;


 

