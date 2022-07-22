const mongoose = require('mongoose')
const Schema = mongoose.Schema
const TrucksSchema = new Schema({
   id: {type: Number},
   model: {type: String},
   price: {type: Number},
   isAvailable: {type : Boolean}
})

module.exports = Truck = mongoose.model('Truck',TrucksSchema)