const mongoose = require("mongoose");

const usersSchema = new mongoose.Schema(
  {
    id: { type: String },
    brand: { type: String },
    color: { type: String },
    size: { type: String },
  },
  { collection: "Computers" }
);

module.exports = mongoose.model("computers", usersSchema);
