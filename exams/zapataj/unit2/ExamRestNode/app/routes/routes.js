const express = require('express');
const Model = require('../models/smartWatch');
const router = express.Router()
router.post('/newsmart', async (req, res) => {
    const data = new Model({
        idSmart: req.body.idSmart,
        size: req.body.size,
        price: req.body.price,
        resistenceWater: req.body.resistenceWater,
    })

    try {
        const dataToSave = await data.save();
        res.status(200).json(dataToSave)
    }
    catch (error) {
        res.status(400).json({message: error.message})
    }
})

module.exports = router;