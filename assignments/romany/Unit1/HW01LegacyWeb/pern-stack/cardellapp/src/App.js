import './App.css';

import react,{Component} from 'react';
import {BrowserRouter as Router, Routes,Route,Link,Switch}from 'react-router-dom';
/**componentes */

import Footer from './components/Footer';
import Main from './components/Main';
import Regreso from './components/Regreso';
import Sillas from './components/Sillas';
import Mesas from './components/Mesas';
import Modulares from './components/Modulares';

class App extends Component {
  render(){
    
    return<div>
      <Router>
        <div className="App" id="comienzo" >
          
          <main>
            <Routes>
              <Route path="/" element={<Main />}/>
              <Route path="/Mesas" element={<Mesas/>}/>
              <Route path="/Modulares" element={<Modulares/>}/>
              <Route path="/Sillas" element={<Sillas/>}/>
              
            </Routes> 
             
            <Regreso/>
            
          </main>
          
          
          <footer>
            <Footer/>
          </footer>
        </div>
      </Router>
    </div>
   }
}

export default App;
