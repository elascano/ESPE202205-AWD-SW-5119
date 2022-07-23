const mongoose = require("mongoose");

const teamSchema = mongoose.Schema({
  idBall: {
    type: Number,
    required: true,
  },
  brand: {
    type: String,
    required: true
  },
  kindSport: {
    type: String,
    required: true
  },
  size: {
    type: Number,
    required: true,
  }
});

module.exports = mongoose.model('sportBalls', teamSchema);