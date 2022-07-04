const express = require('express');
const { restart } = require('nodemon');
const router = express.Router();
const Computer = require('../models/computer')

// Get all
router.get('/', async (req, res) => {
    try {
      const computers = await Computer.find()
      res.json(computers)
    } catch (err) {
      res.status(500).json({ message: err.message })
    }
  })

//Post
router.post('/', async (req, res) => {
    const computer = new Computer({
        id:req.body.id,
        name: req.body.name,
        model: req.body.model,
        size: req.body.size,
        color: req.body.color,
    })
    try{
        const newComputer = await computer.save()
        res.status(201).json(newComputer)
    } catch(err){
        res.status(400).json({ message: err.message })
    }
})


module.exports = router