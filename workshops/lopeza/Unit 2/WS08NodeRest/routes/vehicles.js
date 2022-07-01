const express = require('express')
const router = express.Router()
const Vehicle = require('../models/vehicle')

// Getting all
router.get('/', async (req, res) => {
  try {
    const vehicles = await Vehicle.find()
    res.json(vehicles)
  } catch (err) {
    res.status(500).json({ message: err.message })
  }
})

// Getting One
router.get('/:idItem', getVehicle, (req, res) => {
  res.json(res.vehicle)
})

async function getVehicle(req, res, next) {
    let vehicle
    try {
      vehicle = await Vehicle.findById(req.params.id)
      if (vehicle == null) {
        return res.status(404).json({ message: 'Cannot find vehicle' })
      }
    } catch (err) {
      return res.status(500).json({ message: err.message })
    }
  
    res.vehicle = vehicle
    next()
  }

module.exports = router