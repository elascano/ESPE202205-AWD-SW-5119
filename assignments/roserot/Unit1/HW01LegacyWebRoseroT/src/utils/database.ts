import {Pool} from 'pg'

let conn:any

if(!conn){
    conn = new Pool({
        user: 'postgres',
        password: 'toor',
        host: 'localhost',
        port: 5432,
        database:'Blog'
    });
}

export {conn}

