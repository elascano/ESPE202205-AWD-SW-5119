const express = require("express");
const parkSchema = require("../models/park");
const apartmentSchema = require("../models/apartment");


const router = express.Router();

// create park
router.post("/parks", (req, res) => {
  const park = parkSchema(req.body);
  park
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});

// get all apartments
router.get("/apartment", (req, res) => {
  apartmentSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


module.exports = router;
