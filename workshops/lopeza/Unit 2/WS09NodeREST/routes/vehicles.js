const express = require('express')
const router = express.Router()
const Vehicle = require('../models/vehicle')

// Get all
router.get('/', async (req, res) => {
  try {
    const vehicles = await Vehicle.find()
    res.json(vehicles)
  } catch (err) {
    res.status(500).json({ message: err.message })
  }
})

// Get One
router.get('/:plateId', getVehicle, (req, res) => { 
  res.json(res.vehicle) 
})

async function getVehicle(req, res, next) {
  let vehicle
  try {
    vehicle = await Vehicle.findOne({ plateId: req.params.plateId })
    if (vehicle == null) {
      return res.status(404).json({ message: 'Error! Cannot find vehicle' })
    }
  } catch (err) {
    return res.status(500).json({ message: err.message })
  }

  res.vehicle = vehicle
  next()
}

module.exports = router