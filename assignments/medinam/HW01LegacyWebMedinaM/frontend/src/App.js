import {
  BrowserRouter as Router,
  Routes,
  Route
} from 'react-router-dom';
import { Layout } from "antd";
import Menu from './Componentes/Menu';
import Home from './Pages/Home';
import Footer from './Componentes/Footer';
import Conocenos from './Pages/Conocenos';
import Listas from './Pages/Listas';
import CrearTarea from './Pages/CrearTarea';
import Registro from './Pages/Registro';
import IniciarSesion from './Pages/IniciarSesion';
import Acceso from './Pages/Acceso';
import AuthProvider from './providers/AuthProviders';
import useAuth from './hooks/useAuth';


function App() {

  const {user, isLoading} = AuthProvider();
  if (!user) {
    return (
      <Router>
        <Routes>
          <Route path='/' element={<Home />} />
          <Route path='/conocenos' element={<Conocenos />} />
          <Route path='/listas' element={<Listas />} />
          <Route path='/registro' element={<Registro />} />
          <Route path='/iniciar' element={<IniciarSesion />} />

        </Routes>
        <Footer />
      </Router>
    );
  }

  if (user) {
    return (
    <Router>
       <Menu />
      <Routes>
        <Route path='/acceso' element={<Acceso />} />
        <Route path='/crear' element={<CrearTarea />} />
      </Routes>
      <Footer />
    </Router>);
  }
}

export default App
