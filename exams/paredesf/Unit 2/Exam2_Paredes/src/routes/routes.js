const express = require("express");
const userSchema = require("../models/keyboards");
const router = express.Router();

// create 
router.post("/add", (req, res) => {
  const user = userSchema(req.body);
  user
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get all 
router.get("/all", (req, res) => {
  userSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});

module.exports = router;