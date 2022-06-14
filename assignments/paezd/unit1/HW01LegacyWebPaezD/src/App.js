import React, { Component} from 'react';
import {BrowserRouter as Router,Switch,Route} from 'react-router-dom';
//Components
import Header from './Componentes/Nav/Header';
import Inicio from './Componentes/Paginas/inicio';
import Contactos from './Componentes/Paginas/Contactos';
import Formulario from './Componentes/Paginas/Formulario';
import Servicios from './Componentes/Paginas/Servicios';
import Quienes_Somos from './Componentes/Paginas/Quienes-Somos';
import Registrarse from './Componentes/Paginas/Registrarse';
import Tabla from './Componentes/Paginas/Tabla_Datos';
class App extends Component{
  render(){
    return (
      <Router>
        <Header/>
        <Switch>
        <Route path='/Inicio' exact component={Inicio}/>
          <Route path='/Contacto' exact component={Contactos}/>
          <Route path='/Formulario' exact component={Formulario}/>
          <Route path='/Servicios' exact component={Servicios}/>
          <Route path='/Quienes_Somos' exact component={Quienes_Somos}/>
          <Route path='/Registrarse' exact component={Registrarse}/>
          <Route path={'/Tabla'}exact component={Tabla}/>
        </Switch>
      </Router>
    );
  }
 }
export default App;
