/* eslint-disable jsx-a11y/alt-text */
import React, { Component } from 'react';
import Header1 from './Header1';
import Modal from 'react-modal';
class Mesas extends Component {
    state = {
        mesasList: [],
        modalIsopen:false,
        currentImage:null

    }
    componentDidMount() {
        Modal.setAppElement('body')
        fetch('http://localhost:4000/images/mesas')
            .then(res => res.json())
            .then(res => this.setState({ mesasList: res }))
            .catch(err => {
                console.error(err)
            })
    }
    modalHandler(isOpen,image){
        this.setState({modalIsopen:isOpen})
        this.setState({currentImage:image})
        
    }
    render() {
        return (
            <div>
            <header>
                    <Header1/>
                </header>
            {/*<section class="products">
                <div class="containerSillas">
                    <h2 class="title_products">Catalogo Mesas</h2> 
                    <div class="catalogo_grid">
                        <div class="catalogo_item">
                            <img src={mesa1} className="img_silla"/>
                            <h2 class="descripcion">Mesa M1</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={mesa2} className="img_silla"/>
                            <h2 class="descripcion">Mesa M2</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa3} className="img_silla"/>
                            <h2 class="descripcion">Mesa M3</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa4} className="img_silla"/>
                            <h2 class="descripcion">Mesa M4</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa5} className="img_silla"/>
                            <h2 class="descripcion">Mesa M5</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa6} className="img_silla"/>
                            <h2 class="descripcion">Mesa M6</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa7} className="img_silla"/>
                            <h2 class="descripcion">Mesa M7</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa8} className="img_silla"/>
                            <h2 class="descripcion">Mesa M8</h2>
                        </div>
                        <div class="catalogo_item">
                            <img src={mesa9} className="img_silla"/>
                            <h2 class="descripcion">Mesa M9</h2>
                        </div>
                    </div>                
                </div>
        </section>*/}
        <h2 class="title_products">Catalogo Mesas</h2>
                <div className='container1' style={{ display: "flex", flexWrap: "wrap" }}>
                    {this.state.mesasList.map(image => (
                        <div key={image} className='card m-2'>
                            <p>{image}</p>
                            <img src={'http://localhost:4000/' + image} alt='...' className='card-img-top img_silla'
                                style={{ height: "400px", width: "300px", }} />
                            <div className='card-body'>
                                <button className='btn btn-dark' onClick={
                                    ()=>this.modalHandler(true,image)
                                }>click para ver</button>
                            </div>
                        </div>
                    ))}

                </div>
                
                <Modal style={{content:{right:"25%", left:"25%"}}}
                 isOpen={this.state.modalIsopen} onRequestClose={
                    ()=>this.modalHandler(false,null)
                }>
                    <div className='card'>
                        <img src={'http://localhost:4000/' + this.state.currentImage} alt='...'
                         style={{ height: "100%", width:"100%" }}/>
                        <div className='card-body'>
                                <button className='btn btn-danger' onClick={
                                    ()=>this.setState({modalIsopen:false})
                                }>cerrar</button>
                            </div>
                    </div>
                </Modal>

            </div>
        );
    }
}

export default Mesas;