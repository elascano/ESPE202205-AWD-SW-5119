const express = require("express");
const { restart } = require("nodemon");
const user = require("../models/computer");
const router = express.Router();
const User = require("../models/computer");

// Get all
router.get("/computers", async (req, res) => {
  try {
    const users = await user.find();
    res.json(users);
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
});

module.exports = router;
