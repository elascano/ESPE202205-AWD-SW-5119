const express = require("express");
const userSchema = require("../models/furniture");

const router = express.Router();

// create 
router.post("/furnitures", (req, res) => {
  const user = userSchema(req.body);
  user
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get all 
router.get("/furnitures", (req, res) => {
  userSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get a 
router.get("/furnitures/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .findById(id)
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// update a 
router.put("/furnitures/:id", (req, res) => {
  const { id } = req.params;
  const { name, image_path, alternative_name, objectID } = req.body;
  userSchema
    .updateOne({ _id: id }, { $set: { idFurniture, name, adress, date, endurance, color, type, persons } })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


// delete a user
router.delete("/furnitures/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .remove({ _id: id })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


module.exports = router;
