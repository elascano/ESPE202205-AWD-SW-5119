const mongoose = require('mongoose')

const computersSchema = new mongoose.Schema({
  id: {
    type: String,
    required: true
  },
  name: {
    type: String,
    required: true
  },
  model: {
    type: String,
    required: true
  },
  size: {
    type: Number,
    required: true
  },
  color: {
    type: String,
    required: true
  },
  
})

module.exports = mongoose.model('Computer', computersSchema)