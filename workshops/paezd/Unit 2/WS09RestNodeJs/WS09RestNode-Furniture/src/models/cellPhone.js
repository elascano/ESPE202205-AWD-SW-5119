const mongoose = require("mongoose");

const userSchema = mongoose.Schema({
  brand: {
    type: String,
    required: true,
  },
  camera: {
    type: Number,
    required: true
  },
  color: {
    type: String,
    required: true

  },
  storage: {
    type: String,
    required: true

  },
  system: {
    type: String,
    required: true

  },
  weight: {
    type: Number,
    required: true

  },
  screen: {
    type: String,
    required: true

  }
});

module.exports = mongoose.model('cellPhone', userSchema);