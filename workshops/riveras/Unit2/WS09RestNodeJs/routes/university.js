const express=require("express");
const university = require("../models/university");
const universitySchema = require("../models/university");
const building = require("../models/building");
const buildingSchema = require("../models/building");
const router =express.Router();

router.post('/universities',(req, res)=> {
   const university= universitySchema(req.body);
   university
   .save().then((data)=>res.json(data))
   .catch((error)=>res.json({message:error}));
});

router.get('/universities',(req, res)=> {

   universitySchema
    .find().then((data)=>res.json(data))
    .catch((error)=>res.json({message:error}));
 });

router.get('/universities/:id',(req, res)=> {
    const{id}=req.params;

    universitySchema
    .findById(id)
    .then((data)=>res.json(data))
    .catch((error)=>res.json({message:error}));
 });

 router.post('/building',(req, res)=> {
   const building= buildingSchema(req.body);
   building
   .save().then((data)=>res.json(data))
   .catch((error)=>res.json({message:error}));
});

router.get('/buildings',(req, res)=> {

   buildingSchema
    .find().then((data)=>res.json(data))
    .catch((error)=>res.json({message:error}));
 });

router.get('/building/:id',(req, res)=> {
    const{id}=req.params;

    buildingSchema
    .findById(id)
    .then((data)=>res.json(data))
    .catch((error)=>res.json({message:error}));
 });

module.exports=router;
