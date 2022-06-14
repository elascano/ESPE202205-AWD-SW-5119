import React, { Component, Fragment } from 'react';
import Header1 from './Header1';
import Modal from 'react-modal';
class Sillas extends Component {

    state = {
        sillasList: [],
        modalIsopen:false,
        currentImage:null

    }
    componentDidMount() {
        Modal.setAppElement('body')
        fetch('http://localhost:4000/images/sillas')
            .then(res => res.json())
            .then(res => this.setState({ sillasList: res }))
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
            <div className='bodys'>
                <header>
                    <Header1 />
                </header>                
                <h2 class="title_products">Catalogo Sillas</h2>
                <div className='container1' style={{ display: "flex", flexWrap: "wrap" }}>
                    {this.state.sillasList.map(image => (
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

export default Sillas;