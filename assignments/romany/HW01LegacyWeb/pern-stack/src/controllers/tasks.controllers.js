const pool = require('../db');
const fs = require('fs');
const path=require('path');
/*const fsExtra = require('fs-extra');*/
const getAllTasks = async (req, res, next) => {
    //consulta

    try {
        const allTasks = await pool.query('select * from clientes')
        console.log(allTasks);
        res.json(allTasks.rows);
    } catch (error) {
        next(error);

    }
};
const getTask = async (req, res, next) => {
    const { id } = req.params
    const result = await pool.query('select * from tarea where id=$1', [id])
    try {
        console.log(result)
        if (result.rows.length === 0) return res.status(404).json({ message: 'tarea no encontrada' })
        res.json(result.rows[0]);
    } catch (error) {
        next(error);
    }

};
const createTask = async (req, res, next) => {

    const { Nombres, Apellidos, Cedula, Fec_nac, mail, sexo, comentario, terminos } = req.body;
    //consulta
    try {
        const result = await pool.query('insert into clientes(nombres,apellidos,cedula,fec_nac,mail,sexo,comentarios,terminos) values($1,$2,$3,$4,$5,$6,$7,$8) returning*', [Nombres, Apellidos, Cedula, Fec_nac, mail, sexo, comentario, terminos]);
        console.log(result);
        res.json(result.rows[0]);

    } catch (error) {
        next(error)


    }

};
const deleteTask = async (req, res, next) => {
    const { id } = req.params
    const result = await pool.query('delete from tarea where id=$1 returning *', [id])
    try {
        console.log(result)
        if (result.rowCount === 0) return res.status(404).json({ message: 'tarea no encontrada' })
        return res.status(204);
        //es un resultado que si funciono
    } catch (error) {
        next(error);
    }
    res.send('Eliminando una tarea');
};
const updateTask = async (req, res, next) => {
    try {
        const { id } = req.params;
        const { titulo, descripcion } = req.body;
        const result = await pool.query('update tarea set titulo=$1,descripcion=$2 where id=$3 returning *', [titulo, descripcion, id])
        if (result.rowCount === 0) return res.status(404).json({ message: 'tarea no encontrada' })

        res.json(result.rows[0]);
    } catch (error) {
        next(error);
    }

};
//funcion para recuperar imagenes
const getChairs = async (req, res, next) => {
    //consulta
    //fsExtra.emptyDirSync(path.join(__dirname,'../sillas/'))
    try {
        
        
        const allChairs = await pool.query('select * from sillas')
        console.log(allChairs);
        allChairs.rows.map(img=>{
            //vaciar carpeta
            
            fs.writeFileSync(path.join(__dirname,'../sillas/'+img.id+'-sillas.jpg'),img.imagen)
        })
        const imagedir=fs.readdirSync(path.join(__dirname,'../sillas/'))
        res.json(imagedir);
    } catch (error) {
        next(error);

    }
};
const getMesas = async (req, res, next) => {
    //fsExtra.emptyDirSync(path.join(__dirname,'../mesas/'))
    try {
        const allChairs = await pool.query('select * from mesas')
        console.log(allChairs);
        allChairs.rows.map(img=>{
            fs.writeFileSync(path.join(__dirname,'../mesas/'+img.id+'-mesas.jpg'),img.imagen)
        })
        const imagedir=fs.readdirSync(path.join(__dirname,'../mesas/'))
        res.json(imagedir);
    } catch (error) {
        next(error);

    }
};
const getModulares = async (req, res, next) => {
    //fsExtra.emptyDirSync(path.join(__dirname,'../modulares/'))
    try {
        const allChairs = await pool.query('select * from modulares')
        console.log(allChairs);
        allChairs.rows.map(img=>{
            fs.writeFileSync(path.join(__dirname,'../modulares/'+img.id+'-modular.jpg'),img.imagen)
        })
        const imagedir=fs.readdirSync(path.join(__dirname,'../modulares/'))
        res.json(imagedir);
    } catch (error) {
        next(error);

    }
};
module.exports = {
    getAllTasks,
    getTask,
    createTask,
    deleteTask,
    updateTask,
    getChairs,
    getMesas,
    getModulares
};