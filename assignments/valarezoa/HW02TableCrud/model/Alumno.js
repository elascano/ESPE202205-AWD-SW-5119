const mongoose = require('mongoose')
const Schema = mongoose.Schema
const alumnoSchema = new Schema ({
    name: String,
    age:Number,
    phone:String,
    email:String,
    id:String,
}, {versionKey:false})
module.exports = mongoose.model('alumnos', alumnoSchema)