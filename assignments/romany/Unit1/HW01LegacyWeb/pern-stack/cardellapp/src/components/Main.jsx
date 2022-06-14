import React, { Component } from 'react';
import Inicio from './Inicio';
import Contactanos from './Contactanos';
import SobreNosotros from './SobreNosotros';
import Header from './Header';


class Main extends Component {
    render() {
        return (
            <div>
                <header>
                    <Header/>
                </header>
                <main>
                    <Inicio />       
                    <SobreNosotros/>
                    <Contactanos/>
                </main>
               
            </div>
        );
    }
}

export default Main;