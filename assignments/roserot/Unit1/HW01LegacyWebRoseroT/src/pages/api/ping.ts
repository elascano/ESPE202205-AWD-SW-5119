import { NextApiRequest,NextApiResponse } from "next"
import {conn} from '../../utils/database'

type DataUser={
  id_usuarios:string
  login:string
  password:string
  email:string
  nickname:string
}


export default async function index(req:NextApiRequest,res:NextApiResponse)
{
  const respose = await conn.query('SELECT now()')

  console.log(respose)

  return res.json({});
}
