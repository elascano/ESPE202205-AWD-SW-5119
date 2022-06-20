import { NextApiRequest,NextApiResponse } from "next";
import { conn } from "src/utils/database";


export default async function users(req:NextApiRequest,res:NextApiResponse) {
    
    const {method,body} = req
    
    switch (method) {
        case "GET":
            try {
                const query = "SELECT * FROM USUARIOS";
                const  response = await conn.query(query);
                return res.status(200).json(response.rows)    
            } catch (error:any) {
                return  res.status(500).json({error: error.message});
            }
            
        case "POST":    
            try {
                const {nickname,email,password} = body;
                if (!email)
                {
                    const query = 'SELECT * FROM usuarios WHERE nickname = $1 AND password = MD5($2)'
                    const values =[nickname,password]
                    
                    const respose = await conn.query(query,values)
                    console.log(respose.rows[0])
                    if(respose.rows.length == 0){
                        
                        return res.status(400).json({error:"Usuario no encontrado"})
                    }
                    return res.status(200).json(respose.rows[0])
                }
                else{
                    const query = 'INSERT INTO usuarios (nickname,email,password) VALUES ($1,$2,MD5($3)) RETURNING *'
                    const values =[nickname,email,password]
                    
                    const respose = await conn.query(query,values)
                    
                    return res.status(200).json(respose.rows)

                }
    
            } catch (error:any) {
                
                return  res.status(500).json({error: error.message});
            }
        default:
            res.status(400).json("Invalid method")
            break;
    }

}