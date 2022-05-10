import { route } from "next/dist/server/router";
import Link from "next/link";
import Image from "next/image";
import { useRouter } from "next/router";
import halfmoon from 'src/utils/images/half-moon.png'
import sun from 'src/utils/logos/sun.png'
import { ChangeEvent, FormEvent, useState } from "react";
import { usuarios } from "src/interfaces/usuarios";



function Register()
{
    const router = useRouter() 

    const [usuarios,setUsuarios] = useState({
        nickname:'',
        email:'',
        password:''
    }) 


    const handleChange= ( {target:{name,value}} 
        :ChangeEvent<HTMLInputElement>)=>setUsuarios({...usuarios,[name]:value});

    const createUser = async(usuarios:usuarios)=>{
            await fetch('http://localhost:3000/api/users',{
                method:'POST',
                headers: {
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(usuarios)
            })
    }

    const handleSubmit = async(e:FormEvent<HTMLFormElement>) =>{
        e.preventDefault()
        try {
            await createUser(usuarios)
            
        } catch (error) {
            console.log(error)
        }
    }

    return(
        <div>
        
    

    <div className="card">
        <div className="content">

        <form  id="form" onSubmit={handleSubmit}>
            <h2>Crea tu cuenta gratis</h2>
            <label className="label">Nombre completo</label>
            <input type="text" placeholder="Enter your Full Name here" name="nickname" onChange={handleChange}></input>
            <br></br>
            <label className="label">Correo</label>
            <input type="email" placeholder="Enter your Email here" name="email" onChange={handleChange}></input>
            <br></br>
            <label className="label">Contraseña</label>
            <input type="password" placeholder="Enter your Password here" name="password" onChange={handleChange}></input>
            <br></br>   
            <input type="submit" value="Crear Cuenta" className="btn"></input>
            <label className="label"> Ya tienes cuenta? <Link href="/login">Inicia sesión</Link></label>
            
        </form>

    </div>
    </div>   
    
    <div id="imge"></div>
    
    </div>

    );
}
export default Register;
    // <input type="radio" name="dark-ligth" id="d-mode" checked></input>
    // <input type="radio" name="dark-ligth" id="l-mode"></input>
    // <label htmlFor="l-mode"><Image src={halfmoon} id="img" alt=""/></label>
    // <label htmlFor="d-mode"><Image src={sun} id="img" alt=""/></label>