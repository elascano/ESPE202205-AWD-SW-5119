const express = require('express');
const router = express.Router();

const Person = require('../models/person')
router.get('/',async(req,res)=>{

    try {

        const arrayNamesDB = await Person.find()
        console.log(arrayNamesDB)

    } catch (error) {
        console.log(error)
    }

    res.render("namesList",{
        arrayNames: [
            {name: 'Juan',lastName: 'Perez', description: "Administrator"},
            {name: 'Jorge',lastName: 'Paez', description: "User"}
        ]  
    })
})


module.exports = router;