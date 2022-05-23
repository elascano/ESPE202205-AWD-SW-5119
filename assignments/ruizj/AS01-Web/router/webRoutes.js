const express = require('express');
const router = express.Router();

router.get('/',(req,res)=>{
    res.render("index", {title: DynamicTitle})
})

router.get('/services',(req,res) =>{
    res.render("services",{serviceTitles: "Dynamic Message"})
})

module.exports = router;