const mongoose = require('mongoose')
const Schema = mongoose.Schema

const  WheelchairsSchema = new Schema({
    id : {type: Number},
    name : {type:String},
    type : {type: String},
    largerous : {type: Number }
})

module.exports = Wheelchairs = mongoose.model('Wheelchairs',WheelchairsSchema)