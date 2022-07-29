const mongoose = require('mongoose');

const dataSchema = new mongoose.Schema({
    idSmart: {
        required: true,
        type: String
    },
    size: {
        required: true,
        type: String
    },
    price: {
        required: false,
        type: Number
    },
    resistenceWater:
    {
        required: false,
        type: String
    },
    mark: {
        required: false,
        type: String
    },
    market: {
        required: false,
        type: String
    },
    software: {
        required: false,
        type: String
    }
})

module.exports = mongoose.model('SmartWatches', dataSchema)
