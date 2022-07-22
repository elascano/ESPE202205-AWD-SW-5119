const express = require("express");
const shoeSchema = require("../model/SoccerShoe");
const router = express.Router();

// create user
router.post("/soccerShoe", (req, res) => {
  const soccerShoe = shoeSchema(req.body);
  soccerShoe
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});

module.exports = router;