const express = require("express");
const teamSchema = require("../models/sportBalls");
const router = express.Router();

// get all users
router.get("/sportBallsSantiago", (req, res) => {
  teamSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});

module.exports = router;