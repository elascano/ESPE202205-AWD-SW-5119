const mongoose = require('mongoose')

const vehicleRouterSchema = new mongoose.Schema({
    id: {
        type: Number,
        required: true,
        unique: true
    },
    plateId: {
        type: String,
        required: true,
    },
    brand: {
        type: String,
        required: true
    },
    model: {
        type: String,
        required: true
    }
}, { collection: 'Vehicles' })

module.exports = mongoose.model('Vehicles', vehicleRouterSchema)