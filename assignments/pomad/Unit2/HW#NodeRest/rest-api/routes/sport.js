const express = require('express');
const { remove } = require('../models/Sport');
const router = express.Router();

const Post = require('../models/Sport')

router.get('/', async (req, res)=>{
    try{
        const data = await Post.find();
        res.json(data);
    }catch(err){
        res.status(500).json({message:err})
    }
});

router.get('/:id', async (req, res) => {
    try{
        const data = await Post.findOne({"id": req.params.id});
        res.json(data)
    }
    catch(error){
        res.status(500).json({message: error.message})
    }
})

router.post('/', async (req, res) => {
    const data = new Post({
        id: req.body.id,
        name: req.body.name,
        description: req.body.description,
        origen: req.body.origen
    });
    try{
        const savedPost = await data.save();
        res.status(200).json(savedPost);
    }catch(error){
        res.status(400).json({message: error.message});
    }
});

// Delete
router.delete('/:id', async(req, res)=>{
    try{
        const removeSport = await Post.remove({id: req.params.id});
        res.json(removeSport);
    } catch(err){
        res.json({message: err});
    }
});

//Update a post
router.patch('/:id', async(req, res)=>{
    try{
        const updatedPost = await Post.updateOne(
            {id: req.params.id},
            {$set: {name: req.body.name,
                    description: req.body.description,
                    origen: req.body.origen}
            }
        );
        res.json(updatedPost);
    }catch(err){
        res.json({message: err});
    }
});


module.exports = router;