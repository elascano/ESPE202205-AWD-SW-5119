const express = require('express');
const Model = require('../models/user');
const router = express.Router()
router.post('/post', async (req, res) => {
    const data = new Model({
        idSmart: req.body.idSmart,
        size: req.body.size,
        price: req.body.price,
        resistenceWater: req.body.resistenceWater,
        mark: req.body.mark,
        market: req.body.market,
        software: req.body.software
    })

    try {
        const dataToSave = await data.save();
        res.status(200).json(dataToSave)
    }
    catch (error) {
        res.status(400).json({message: error.message})
    }
})

router.get('/getAll', async (req, res) => {
    try{
        const data = await Model.find();
        res.json(data)
    }
    catch(error){
        res.status(500).json({message: error.message})
    }
})

module.exports = router;