const mongoose = require('mongoose');

const dataSchema = new mongoose.Schema({
    _id:{
        required:false
    },
    id: {
        required: true,
        type: Number
    },
    brand: {
        required: true,
        type: String
    },
    color: {
        required: true,
        type: String
    },
    price: {
        required: true,
        type: Number
    }
})

module.exports = mongoose.model('items', dataSchema)