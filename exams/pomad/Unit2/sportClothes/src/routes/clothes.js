const express = require("express");
const router = express.Router();
const ComputersSchema = require("../models/clothes");


const Clothes = require('../models/clothes')

router.get('/', async (req, res)=>{
    try{
        const data = await Clothes.find();
        res.json(data);
    }catch(err){
        res.status(500).json({message:err})
    }
});

//get by id
router.get('/:id', async (req, res) => {
    try{
        const data = await Clothes.findOne({"id": req.params.id});
        res.json(data)
    }
    catch(error){
        res.status(500).json({message: error.message})
    }
})

module.exports = router;
  
  