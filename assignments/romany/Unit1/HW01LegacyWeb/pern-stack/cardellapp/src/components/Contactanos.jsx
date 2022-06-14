import react, { Component, useState } from 'react';

class Contactanos extends Component {

    //creamos un estado
    state = {
        Nombres: '',
        Apellidos: '',
        Cedula: '',
        Fec_nac: '',
        mail: '',
        sexo: '',
        comentario: '',
        terminos: ''
    }
    componentDidMount() {
        console.log('render!')
    }



    /*creamos el metodo onsubmit*/
    onSubmit = async (e) => {
        /*para evitar que se refresque la pagina*/
        e.preventDefault();


        const res = await fetch('http://localhost:4000/tasks', {
            method: 'POST',
            body: JSON.stringify(this.state),
            headers: { "Content-Type": "application/json" },
        })
        const data= await res.json()
        if (data.mensaje != null) {
            alert("Ya existe un usuarios asociado al correo")
        } else {
            console.log(data)
            this.setState({
                Nombres: '',
                Apellidos: '',
                Cedula: '',
                Fec_nac: '',
                mail: '',
                sexo: '',
                comentario: '',
                terminos: ''

            })

        }

        


    }
    onChange = e => {
        this.setState({
            [e.target.name]: e.target.value

        })
        var miCheckbox = document.getElementById('check');
        if (miCheckbox.checked) {
            this.setState({
                terminos: true

            })
        } else {
            this.setState({
                terminos: false

            })
        }
        let check = document.querySelector('#check1');
        let check2 = document.querySelector('#check2');
        // Utilizo la propiedad "chequed" para saber si esta seleccionado.
        if (check.checked) {
            this.setState({
                sexo: 'h'

            })
        } else {
            this.setState({
                sexo: 'm'

            })
        }

    }
    render() {
        return <div>
            <div className="flex-co" id="contactanos">
                <form className="form1" onSubmit={this.onSubmit}>
                    <div>
                        <input type="text" className="form1__input" placeholder="Nombres"
                            name='Nombres'
                            onChange={this.onChange}
                            value={this.state.Nombres} required />
                    </div>
                    <div>
                        <input type="text" className="form1__input" placeholder="Apellidos"
                            name='Apellidos'
                            onChange={this.onChange}
                            value={this.state.Apellidos} required />
                    </div>
                    <div>
                        <input type="text" className="form1__input" placeholder="Cédula"
                            name='Cedula'
                            onChange={this.onChange}
                            value={this.state.Cedula} required />
                    </div>
                    <div className="fecnac">
                        <p>Fecha de nacimiento</p>
                    </div>
                    <div>
                        <input type="date" id="start" name="trip-start" min="1900-11-29" max="2021-12-31"
                            className="form1__input" placeholder="Fecha de nacimiento"
                            name='Fec_nac'
                            onChange={this.onChange}
                            value={this.state.Fec_nac} required />
                    </div>
                    <div>
                        <input type="email" className="form1__input" placeholder="Correo electrónico"
                            name='mail'
                            onChange={this.onChange}
                            value={this.state.mail} required />

                    </div>
                    {/*<div>
                    <input type="password" name= "password" className="form1__input" placeholder="Contraseña"/>
                    
                </div>
                <div>
                    <input type="password" name= "password" className="form1__input" placeholder="Confirmar Contraseña"/>
                    
                </div>*/}

                    <div className="form1__input">
                        <div className="radios">
                            <div>Hombre</div><input type="radio" name="sexo" value="h" className="form1__input"
                                id='check1'
                                placeholder="Hombre"
                                onChange={this.onChange}
                                value={this.state.sexo} />

                            <div>Mujer</div><input type="radio" name="sexo" value="m"
                                id='check2'
                                className="form1__input" placeholder="Mujer"
                                onChange={this.onChange}
                                value={this.state.sexo} />
                        </div>


                    </div>
                    <div>
                        <textarea className="form1__input" placeholder="Deje su comentario"
                            name='comentario'
                            onChange={this.onChange}
                            value={this.state.comentario} />
                    </div>
                    <div className="check">
                        <input type="checkbox"
                            id='check'
                            name='terminos'
                            onChange={this.onChange}
                            value={this.state.terminos} required /><div>   He leído términos y condiciones</div>
                    </div>
                    <div>
                        <input type="submit" name="" className="form1__input" />
                    </div>
                </form>
                <div className="imalogo">



                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1154.6213766842259!2d-78.48551216263456!3d-0.2560015975581081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d599d2bffea027%3A0x5bf6a2af665653e5!2sCar%20Del!5e0!3m2!1ses!2sec!4v1640745518345!5m2!1ses!2sec"
                        width="800" height="450" loading="lazy"
                    />
                </div>
            </div>
        </div>
    }
};



export default Contactanos;