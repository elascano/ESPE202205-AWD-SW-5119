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
        type: Boolean
    },
})

module.exports = mongoose.model('SmartWatches', dataSchema)
