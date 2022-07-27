const WheelchairsController = require('../controller/Wheelchairs')
const express = require('express')
const router = express.Router()

//router.metodo_CRUD('uri',)

router.get('/', WheelchairsController.getWheelchairs)

module.exports = router
