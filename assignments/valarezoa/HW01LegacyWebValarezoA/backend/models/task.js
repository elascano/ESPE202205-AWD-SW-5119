const mongoose = require("mongoose");
const Schema = mongoose.Schema;


const TaskSchema = Schema({
    actividad: String,
    tiempo: String,
    creacion: String,
    descripción: String,
    subtareas: String,
    agendar: String,
    subCont1: String,
    subAct1: Boolean,
    subCont2: String,
    subAct2: Boolean,
    subCont3: String,
    subAct3: Boolean,
    subCont4: String,
    subAct4: Boolean,
    subCont5: String,
    subAct5: Boolean
});


module.exports = {
    TaskSchema
}
