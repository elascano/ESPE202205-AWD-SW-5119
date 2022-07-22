const express = require('express')
const router = express.Router()
const Vehicle = require('../models/vehicle')

router.post('/vehicle/add', async (req, res) => {
    const vehicle = new Vehicle({
        id: req.body.id,
        plateId: req.body.plateId,
        brand: req.body.brand,
        model: req.body.model,
    })
    try {
        const newVehicle = await vehicle.save()
        res.status(201).json(newVehicle)
    } catch (err) {
        res.status(400).json({ message: err.message })
    }
})

module.exports = router