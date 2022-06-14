 /*import React,{ Fragment } from "react";
import './App.css';

//components

import InputTodo from"./components/InputTodo";
import ListTodos from "./components/ListTodos"

function App() {
    return(
        <Fragment>
          <div className="container"></div>
            <InputTodo></InputTodo>
            <ListTodos></ListTodos>
        </Fragment>
    )


} */ 
import './App.css';
import './pages/Home';
import React from 'react';

import RouterPage from './pages/RouterPage';

function App() {
  return (
<RouterPage/>

  );
} 
export default App;
