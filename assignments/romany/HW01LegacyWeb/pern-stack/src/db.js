const { Pool } = require('pg');
const {db}=require('./config')
//vamos a traer la clase que se llama Pool
//pool nos va a permitir crear una conexion
//este pool al ejecutarlo recibe un objeto de configuracion que es el usuario la contraseña

const pool = new Pool({
   
    user: db.user,
    password: db.password,
    host: db.host,
    port: db.port,
    database: db.database
    /*user: 'postgres',
    password: 'tarabita2',
    host: 'localhost',
    port: 5432,
    database: 'hola'*/
});
module.exports = pool;