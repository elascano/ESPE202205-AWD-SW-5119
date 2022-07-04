const mongoose = require("mongoose");

const parkSchema = mongoose.Schema({
  name: {
    type: String,
    required: true,
  },
  id: {
    type: Number,
    required: true
  },
  description: {
    type: String,
    required: true,
  },
  city: {
    type: String,
    required: true,
  },
  address: {
    type: String,
    required: true

  }
}, { collection: 'parks' });
module.exports = mongoose.model('park', parkSchema);