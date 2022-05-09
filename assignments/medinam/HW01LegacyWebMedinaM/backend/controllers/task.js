const bcrypt = require("bcrypt-nodejs");
const mongoose = require("mongoose");
const Schema = require("../controllers/user")


function createTask(req, res) {
    
    
    const { cuenta, actividad , tiempo, creacion , descripción , subtareas , agendar ,
            subCont1 , subAct1 , subCont2 , subAct2 , subCont3 , subAct3 ,
            subCont4 , subAct4 , subCont5 , subAct5 } = req.body;

            const Task = mongoose.model(cuenta,Schema.TaskSchema);
            const task = Task();

            task.cuenta = cuenta;
            task.actividad = actividad ;
            task.tiempo = tiempo ; 
            task.creacion = creacion ;
            task.descripción = descripción ;
            task.subtareas = subtareas ;
            task.agendar = agendar ;
            task.subCont1 = subCont1 ;
            task.subAct1 = subAct1 ;
            task.subCont2 = subCont2 ;
            task.subAct2 = subAct2 ;
            task.subCont3 = subCont3 ;
            task.subAct3 = subAct3 ;
            task.subCont4 = subCont4 ;
            task.subAct4 = subAct4 ;
            task.subCont5 = subCont5 ;
            task.subAct5 = subAct5 ;


        task.save((err, taskStored) => {
            if (err) {
                res.status(500).send({ message: "La tarea ya existe" });
            } else {
                if (!taskStored) {
                    res.status(404).send({ message: "Error al crear la tarea" });
                } else {
                    res.status(200).send({ task: taskStored });
                }
            }
        })
}



module.exports = {
    createTask
};