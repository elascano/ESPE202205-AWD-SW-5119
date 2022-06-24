const mongoose = require("mongoose");

const userSchema = mongoose.Schema({
  name: {
    type: String,
    required: true,
  },
  image_path: {
    type: String,
    required: true
  },
  alternative_name: {
    type: String,
    required: true

  },
  objectID: {
    type: String,
    required: true

  }
});

module.exports = mongoose.model('Actor', userSchema);