const express = require("express");
const userSchema = require("../models/chair");

const router = express.Router();

// create car
router.post("/add/chair", (req, res) => {
  const user = userSchema(req.body);
  user
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get all actors
router.get("/chairs", (req, res) => {
  userSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});

module.exports = router;
