const express = require("express");
const router = express.Router();
const GlassesSchema = require("../models/glasses");

router.post("/glasses", (req, res) => {
    const computer = GlassesSchema(req.body);
    computer
      .save()
      .then((data) => res.json(data))
      .catch((error) => res.json({ message: error }));
  });

  router.get("/glasses", (req, res) => {
    GlassesSchema.find()
      .then((data) => res.json(data))
      .catch((error) => res.json({ message: error }));
  });
  

  router.get("/glasses/:id", (req, res) => {
    const {id} = req.params;
    GlassesSchema.findById(id)
      .then((data) => res.json(data))
      .catch((error) => res.json({ message: error }));
  });

  router.put("/glasses/:id", (req, res) => {
    const { id } = req.params;
    const {serialNumber, brand, model,  price} = req.body;
    GlassesSchema.updateOne({_id: id},{$set: {serialNumber, brand, model,  price}})
      .then((data) => res.json(data))
      .catch((error) => res.json({ message: error }));
  });

  module.exports = router;
  