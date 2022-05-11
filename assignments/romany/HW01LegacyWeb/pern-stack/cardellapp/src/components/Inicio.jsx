import react,{Component} from 'react';
import mesas from './mesas.jpg';
import sillas from './SILLASS.png';
import modulares from './modulares.jpg';

class Inicio extends Component {
    render(){
        return<div id="inicio">
            <section classNames="products" id="productos" >
              <div className="container">
                  <div className="produContainer">
                      
                          <h2 className="title_products"><b>Productos</b></h2> 
                     
                     
                  </div>
                  
                  <div className="products_grid">
                      <article className="products_item">
                          <img src={mesas} className="products_img"/>
                          <div className="products_hover">
                              <a href="/Mesas" className="nav__items">Ver catalogo<br/>
                              <i className="far fa-file-alt proyects_icon"></i></a>
                          </div>
                      </article>

                      <article className="products_item">
                          <img src={modulares} class="products_img"/>
                          <div className="products_hover">
                              <a href="/Modulares" className="nav__items">Ver catalogo<br/>
                              <i className="far fa-file-alt proyects_icon"></i></a>
                          </div>
                      </article>

                      <article className="products_item">
                          <img src={sillas} className="products_img"/>
                          <div className="products_hover">
                              <a href="/Sillas" className="nav__items">Ver catalogo<br/>
                              <i className="far fa-file-alt proyects_icon"></i></a>
                          </div>
                      </article>
                  </div>
              </div>
          </section>
        </div>
    }
};

export default Inicio;