const mongoose = require("mongoose");

const userSchema = mongoose.Schema({
  name: {
    type: String,
    required: true,
  },
  price: {
    type: String,
    required: true,
  },
  color: {
    type: String,
    required: true
  },
  code: {
    type: String,
    required: true

  }
});

module.exports = mongoose.model('Chair ', userSchema);