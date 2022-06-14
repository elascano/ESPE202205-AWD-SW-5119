//cuando quiera eliminar un dato va a tener que visitar una url especifica
const { Router } = require('express');
//importamos desde express a router
//aqui tenemos el nuevo objeto llamado router que nos va a permitir crear nuevas url
const router = Router();
//VAMOS A LLAMAR A LA BASE DE DATOS

const { getAllTasks, getTask, createTask, deleteTask, updateTask,getChairs, getMesas,getModulares } = require('../controllers/tasks.controllers');

//vamos a crear una url basica que va a presentar hello world
/*router.get('/tasks',async (req,res)=>{
    const result=await pool.query('SELECT NOW()')
   console.log(result)
   res.send(result.rows[0].now)
});*/
//para retornar una sola tarea
/*const path=require('path')
const multer = require('multer')
//deja la imagen en una carpeta para que el servidor disponga de ella
const diskstorage = multer.diskStorage(
    {
        destination: path.join(__dirname,'../images'),
        filename:(req,file,cb)=>{
            cb(null,Date.now()+'-monkeywit-'+file.originalname)
        }
    }
)
const fileUpload=multer(    {
        storage:diskstorage
}).single('image')*/
router.get('/tasks/:id', getTask);
router.get('/images/sillas', getChairs);
router.get('/images/mesas',getMesas);
router.get('/images/modulares',getModulares);
router.get('/tasks', getAllTasks);
router.post('/tasks', createTask);
router.put('/tasks/:id', updateTask);
router.delete('/tasks/:id', deleteTask);

//exportamos por el navegador con el module
module.exports = router;