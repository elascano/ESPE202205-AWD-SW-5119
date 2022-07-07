const mongoose = require("mongoose");

const userSchema = mongoose.Schema({
  idFurniture: {
    type: Number,
    required: true,
  },
  name: {
    type: String,
    required: true
  },
  adress: {
    type: String,
    required: true

  },
  date: {
    type: String,
    required: true

  },
  endurance: {
    type: String,
    required: true

  },
  color: {
    type: String,
    required: true

  },
  type: {
    type: String,
    required: true

  },
  persons: {
    type: Number,
    required: true

  }
});

module.exports = mongoose.model('Furniture', userSchema);