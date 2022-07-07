const express = require("express");
const userSchema = require("../models/cellPhone");

const router = express.Router();

// create 
router.post("/cellPhone", (req, res) => {
  const user = userSchema(req.body);
  user
    .save()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get all 
router.get("/cellPhone", (req, res) => {
  userSchema
    .find()
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// get a 
router.get("/cellPhone/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .findById(id)
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});
// update a 
router.put("/cellPhone/:id", (req, res) => {
  const { id } = req.params;
  const { name, image_path, alternative_name, objectID } = req.body;
  userSchema
    .updateOne({ _id: id }, { $set: { brand, camera, color, storage, systema, weight, screen  } })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


// delete a user
router.delete("/cellPhone/:id", (req, res) => {
  const { id } = req.params;
  userSchema
    .remove({ _id: id })
    .then((data) => res.json(data))
    .catch((error) => res.json({ message: error }));
});


module.exports = router;
