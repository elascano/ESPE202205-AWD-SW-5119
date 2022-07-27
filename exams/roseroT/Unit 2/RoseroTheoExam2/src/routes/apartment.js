const express = require("express");
const apartmentSchema = require("../models/apartment");


const router = express.Router();

// get all apartments
router.get("/Apartments", (req, res) => {
  apartmentSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


module.exports = router;
