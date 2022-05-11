import React, { Component } from 'react';

class Footer extends Component {
    render() {
        return (
            <div>
                <div className="footer">
              <section className="footer_contact">            
                  <h2 className="titulo_footer">Nuestras redes</h2>
                  <div className = "footer_icons">                        
                      <span className="container_icons">
                          <a className="fab fa-facebook footer_icon" href="https://www.facebook.com/Carlos.Delgado1982"></a>
                      </span>
                      <span className="container_icons">
                          <a className="fab fa-whatsapp footer_icon" href="https://api.whatsapp.com/send?phone=593999698376&app=facebook&entry_point=page_cta&fbclid=IwAR0y5acq5Bqwva0Iqi7eHQV0_Z0glHjCUx698WIwANaNaWHxzKb7w3USj_4"></a>
                      </span>
                      <span className="container_icons">
                          <a className="fab fa-instagram footer_icon" href="https://www.instagram.com/cardel.1982"></a> 
                      </span>
                  </div>
              </section>
          </div>       
            </div>
        );
    }
}

export default Footer;