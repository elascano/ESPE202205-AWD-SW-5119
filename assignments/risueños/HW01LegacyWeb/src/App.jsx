import React, {useEffect} from 'react';
import Home from "./pages/Home";
import ProductList from './pages/ProductList'
import Product from "./pages/SingleProduct"
import Cart from "./pages/Cart"
import {BrowserRouter as Router,Routes,Route} from "react-router-dom";
import {getProducts, getCategoriesList} from "./data";
import ScrollToTop from "./ScrollToTop";
import Login from './pages/Login'
import Register from './pages/Register'

const App = () => {
  const [productsList, setProductList] = React.useState([])
  const [categoriesList, setCategoriesList] = React.useState([])

  useEffect(() => {
    getProducts("", setProductList)
    getCategoriesList(setCategoriesList)
  }, [])

  function filterProducts(category){
    let categoryFiltered = productsList;
    categoryFiltered = categoryFiltered.filter(function (el) {
      return el.category === category
    });

    return categoryFiltered;
  }

  return(
    <Router>
        <ScrollToTop />
        <Routes>
          
          {
          
          categoriesList.map(c =>
            <Route path={`/Products/${c.id}`} key={c.id} element={<ProductList products={filterProducts(c.id)} title={c.title}/>}></Route>
    
          )
          }
          
          {productsList.map(product =>
            <Route path={`/SingleProduct/${product.id}`} key={product.id} element={<Product product={product} /> }/>
          )}
         
          
          <Route path="/cart" element={<Cart/>}/>
          <Route path="/" element={<Home/>}/>
          <Route path="/login" element={<Login/>}/>
          <Route path="/register" element={<Register/>}/>
        </Routes>
    </Router>
  );
};

export default App;