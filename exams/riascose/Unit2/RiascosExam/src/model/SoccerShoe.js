const mongoose = require("mongoose");

const shoeSchema = mongoose.Schema({
  id: {
    type: Number,
    required: true,
  },
  brand: {
    type: String,
    required: true
  },
  size: {
    type: Number,
    required: true
  },
  color: {
    type: String,
    required: true,
  }
});

module.exports = mongoose.model('SoccerShoe', shoeSchema);