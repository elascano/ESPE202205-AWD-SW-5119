const express=require("express");
const shoesSchema = require("../models/user");
const router =express.Router();

//create shoes
router.post('/shoes',(req, res)=> {
   const shoe= shoesSchema(req.body);
   shoe
   .save().then((data)=>res.json(data))
   .catch((error)=>res.json({message:error}));
});

//get all shoes
router.get('/shoes',(req, res)=> {

   shoesSchema
    .find().then((data)=>res.json(data))
    .catch((error)=>res.json({message:error}));
 });

 //get shoes
router.get('/shoes/:id',(req, res)=> {
   const{id}=req.params;

   shoesSchema
   .findById(id)
   .then((data)=>res.json(data))
   .catch((error)=>res.json({message:error}));
});


module.exports=router;
