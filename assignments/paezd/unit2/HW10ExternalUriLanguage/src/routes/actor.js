const express = require("express");
const userSchema = require("../models/actor");

const router = express.Router();

// create car
router.post("/actors", (req, res) => {
  const user = userSchema(req.body);
  user
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get all actors
router.get("/actors", (req, res) => {
  userSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get a user
router.get("/actors/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .findById(id)
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// update a actor
router.put("/actors/:id", (req, res) => {
  const { id } = req.params;
  const { name, image_path, alternative_name, objectID } = req.body;
  userSchema
    .updateOne({ _id: id }, { $set: { name, image_path, alternative_name, objectID } })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


// delete a user
router.delete("/actors/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .remove({ _id: id })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


module.exports = router;
