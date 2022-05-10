import { NavLink } from 'react-router-dom'
import { slide as Menu } from 'react-burger-menu';
import '../Estilos CSS/menu.css'

export default props => {
  return (
    <Menu>
      <NavLink className="menu-item" to="/" >
        Inicio
      </NavLink>

      <NavLink className="menu-item" to="/conocenos" >
        Conocenos
      </NavLink>

      <NavLink className="menu-item" to="/listas" >
        Listas
      </NavLink>

      <NavLink className="menu-item" to="/creartarea" >
        Crear
      </NavLink>

      <NavLink className="menu-item" to="/registro" >
       Registrarse
      </NavLink>

      <NavLink className="menu-item" to="/iniciar" >
        Iniciar sesion
      </NavLink>

    </Menu>
  );
};
