const mongoose = require("mongoose");

const apartmentSchema = mongoose.Schema({
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
}, { collection: 'apartments' });
module.exports = mongoose.model('apartment', apartmentSchema);