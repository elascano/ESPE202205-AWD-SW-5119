import Image from "next/image";
import sun from "src/utils/images/sun.png";
import moon from "src/utils/images/half-moon.png";
import Link from "next/link";
import { getCookie, setCookies } from 'cookies-next';
import { ChangeEvent, FormEvent, useState } from "react";
import { usuarios } from "src/interfaces/usuarios";
import { useRouter } from "next/router";




function Login() {

  const router = useRouter()

  const [user,setUsuarios] = useState({
    nickname:'',
    password:''
  }) 
  
  const loginUser =async (user:usuarios) => {
    return await fetch('http://localhost:3000/api/users',{
                method:'POST',
                headers: {
                    'Content-Type':'application/json'
                },
                body: JSON.stringify(user)
            })
  }
  
  const handleChange= ( {target:{name,value}} 
    :ChangeEvent<HTMLInputElement>)=>setUsuarios({...user,[name]:value});
    
    const handleSubmint = async(e:FormEvent)=>{
          e.preventDefault();
          try {
              const log = await loginUser(user)

              if(log.status == 400){
                  throw "Usuario no encontrado"
              }

              setCookies(user.nickname,user.password)
              setCookies("log","V")

              console.log(getCookie(user.nickname))
              router.push("/HomePage")

          } catch (error) {
            console.log(error)
          }
    }
    
  return (
    <form onSubmit={handleSubmint}>
        <div className="LoginS-bodylog">
        <div className="LoginS-container">
          <div className="LoginS-boxLog">
            <h1>Inicia Sesion</h1>
            <form id="LoginS-form" />
            <label className="LoginS-labelUser">Usuario</label>
            <p>
              <input className="LoginS-userBox" maxLength={100} type="text" name="nickname" onChange={handleChange} />
            </p>
            <label className="LoginS-labelPassword">Contraseña</label>
            <p>
              <input className="LoginS-userBox" maxLength={50} name="password" type="password" onChange={handleChange}/>
            </p>
            <p>
              ¿No tiene cuenta? <Link href="/register">Regístrate</Link>
            </p>
          </div>
          <div className="LoginS-botones">
            <input className="LoginS-btn" type="submit" defaultValue="Iniciar Sesion" />
            <button className="LoginS-btn-google" id="LoginS-btn_google">
              Inicia con Google
            </button>
          </div>
          <div className="LoginS-logo" />
        </div>
      </div>
  </form>
  );
}

export default Login;

        // <input type="radio" name="LoginS-dark-ligth" id="LoginS-d-mode" defaultChecked />
        // <label htmlFor="LoginS-d-mode">
        //   <Image src={sun} id="LoginS-img" alt=""/>
        // </label>
        // <input type="radio" name="LoginS-dark-ligth" id="LoginS-l-mode" />
        // <label htmlFor="LoginS-l-mode">
        //   <Image src={moon} id="LoginS-img" alt=""/>
        // </label>