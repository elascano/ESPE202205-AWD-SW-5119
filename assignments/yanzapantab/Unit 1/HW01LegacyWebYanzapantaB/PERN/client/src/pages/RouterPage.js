import React from 'react';
import {BrowserRouter as Router,Switch, Route} from 'react-router-dom'
import Home from './Home';
import About from './About';
import Informacion from './Informacion';
import Reservaciones from './Reservaciones';
import Menu from './Menu';
export default function RouterPage() {
  return (
      <div>
          <Router>
              <Switch>
                <Route  path="/"  exact component={Home}/>
                <Route  path="/about"   component={About}/>
                <Route  path="/info"   component={Informacion}/>
                <Route  path="/reser"   component={Reservaciones}/>
                <Route  path="/menu"   component={Menu}/>
              </Switch>
          </Router>
      </div>
  );
}
