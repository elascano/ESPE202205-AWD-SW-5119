const express = require('express');
const res = require('express/lib/response');
//importamos el modulo morgan
const morgan = require('morgan');
//ejecutamos express y la ejecutamos en una constante app
//importamos cors
const cors=require('cors');
const path=require('path');
const taskRoutes = require('./routes/tasks.routes')

const app = express();
//podemos ver por consola las peticiones que van llegando
app.use(cors());
//va a permitir comunicar ambos servidores de manera simple
app.use(morgan('dev'));
//despues vamos a escuchar a express en el puerto 3000
app.use(express.json());
//utilizamos task routes
app.use(taskRoutes);

/*midleware para mostrar las imegenes y poder acceder a una carpeta desde el servidor*/

app.use(express.static(path.join(__dirname,'sillas')))
app.use(express.static(path.join(__dirname,'mesas')))
app.use(express.static(path.join(__dirname,'modulares')))
//vamos a utilizar midewars con 4 parametros
//next permite saltar la funcion y enviarla hacia otro lugar o que continue con la siguiente
//enviamos tambien el error y esta funcion espera ser visitada cuando el error ocurra
app.use((err, req, res, next) => {
    return res.json(
        {
            mensaje: err.message
        }
    )

})

app.listen(4000);
//colocamos un mensaje por consoloa que diga 

//importamoe el modulo task router
console.log('server on port 4000')