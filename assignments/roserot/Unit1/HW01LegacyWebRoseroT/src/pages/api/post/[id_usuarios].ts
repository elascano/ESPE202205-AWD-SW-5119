import { NextApiRequest, NextApiResponse } from "next";
import {conn} from "src/utils/database" 

// eslint-disable-next-line import/no-anonymous-default-export
export default async (req:NextApiRequest,res:NextApiResponse) => {
    
    console.log(req.query)

    const {method,query} = req
    
    switch (method) {
        case "GET":
            try {
                const text = 'SELECT titulo, fecha_publicacion, contenido, estatus FROM post as ps where ps.id_usuarios = $1' 
                const values = [query.id_usuarios]
                const result = await conn.query(text,values)
                
                console.log(query.id_usuarios)

                if (result.rows.length ===0) 
                {
                    return res.status(404).json({message:"Post no found"})
                }

                return res.status(200).json(result.rows)
            } catch (error:any) {
                return res.status(500).json({message:error.message})
            }

        case "PUT":
            res.status(200).json("update data")
            break;
        case "DELETE":
            res.status(200).json("delete data")
            break;    
        default:
            res.status(400).json("Invalid method")
            break;
    }

}