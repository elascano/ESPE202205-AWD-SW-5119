import React from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import Navbar from "./components/Navbar/Navbar";

import Home from "./components/Home";
import Contact from "./components/Contact";
import About from "./components/About";
import Helados from "./components/Helados";


const App = () => {
  return (
    <Router>
      <Navbar />

      <Switch>
        <Route path="/" component={Home} exact>
          <Home />
        </Route>

        <Route path="/about" component={About} exact>
          <About />
        </Route>

        <Route path="/contact" component={Contact} exact>
          <Contact />
        </Route>

        <Route path="/helados" component={Helados} exact>
          <Helados />
        </Route>
      </Switch>

    </Router>
    
  );
};

export default App;
