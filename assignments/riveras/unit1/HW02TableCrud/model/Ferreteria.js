const mongoose = require('mongoose')
const Schema = mongoose.Schema
const ferreteriaSchema = new Schema ({
    nombre: String,
    precio:Number,
    cantidad:Number,
    stock: String,
    marca: String,
}, {versionKey:false})
module.exports = mongoose.model('ferreterias', ferreteriaSchema)