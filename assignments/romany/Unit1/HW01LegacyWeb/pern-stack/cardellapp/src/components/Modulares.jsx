import React, { Component } from 'react';
import Modal from 'react-modal';
import Header1 from './Header1';

class Modulares extends Component {
    state = {
        modularesList: [],
        modalIsopen:false,
        currentImage:null

    }
    componentDidMount() {
        Modal.setAppElement('body')
        fetch('http://localhost:4000/images/modulares')
            .then(res => res.json())
            .then(res => this.setState({ modularesList: res }))
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
           {/* <section class="products">
                <div class="containerSillas">
                    <h2 class="title_products">Catalogo Modulares</h2> 
                    <div class="catalogo_grid">
                        <div class="catalogo_item">
                            <img src={M1} className="img_silla"/>
                            <h2 class="descripcion">Modulares M1</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M2} className="img_silla"/>
                            <h2 class="descripcion">Modulares M2</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M3} className="img_silla"/>
                            <h2 class="descripcion">Modulares M3</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M4} className="img_silla"/>
                            <h2 class="descripcion">Modulares M4</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M5} className="img_silla"/>
                            <h2 class="descripcion">Modulares M5</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M6} className="img_silla"/>
                            <h2 class="descripcion">Modulares M6</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M7} className="img_silla"/>
                            <h2 class="descripcion">Modulares M7</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M8} className="img_silla"/>
                            <h2 class="descripcion">Modulares M8</h2>
                        </div>                       
                        <div class="catalogo_item">
                            <img src={M9} className="img_silla"/>
                            <h2 class="descripcion">Modulares M9</h2>
                        </div>             
                    </div>                
                </div>
        </section>*/}
        <h2 class="title_products">Catalogo Modulares</h2>
                <div className='container1' style={{ display: "flex", flexWrap: "wrap" }}>
                    {this.state.modularesList.map(image => (
                        <div key={image} className='card m-2'>
                            <p>{image}</p>
                            <img src={'http://localhost:4000/' + image} alt='...' className='card-img-top img_silla'
                                style={{ height: "400px", width: "400px", }} />
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

export default Modulares;