const TrucksController = require('../controller/Trucks')
const express = require('express')

const router = express.Router()

router.get('/:id',TrucksController.getTruckById)

module.exports= router