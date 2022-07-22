const express = require('express');
const shoe = require('../models/casualShoes');

const router = express.Router();

//POST
router.post('/newShoe', (req, res) =>{
    const newShoe = shoe(req.body);
    newShoe.save()
        .then((data) => res.json (data))
        .catch((error) => res.json({message: error}))
});

//GET
router.get('/all', (req, res) =>{
    const newShoe = shoe;
    newShoe.find()
        .then((data) => res.json (data))
        .catch((error) => res.json({message: error}))
});

router.get('/:id', (req, res) =>{
    const { id } = req.params;
    const newShoe = shoe;
    newShoe.findOne({ _id:id })
        .then((data) => res.json (data))
        .catch((error) => res.json({message: error}))
});
module.exports = router;

