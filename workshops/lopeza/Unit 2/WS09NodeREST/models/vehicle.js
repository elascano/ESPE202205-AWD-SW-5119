const mongoose = require('mongoose')

const vehicleSchema = new mongoose.Schema({
  plateId: {
    type: String,
    required: true,
    unique: true
  },
  brand: {
    type: String,
    required: true
  },
  model: {
    type: String,
    required: true
  },
  year: {
    type: Number,
    required: true
  },
  color: {
    type: String,
    required: true
  }

}, { collection: 'Vehicles' })

module.exports = mongoose.model('Vehicles', vehicleSchema)