const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const port = 3017;

const EndPointsWheelchairs = require('./api/EndPointsWheelchairs')

const app = express();

app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
app.use("/Wheelchairs",EndPointsWheelchairs)


mongoose.connect("mongodb+srv://admin:admin@cluster0.uxgwiwo.mongodb.net/MoonShard?retryWrites=true&w=majority",
{useNewUrlParser: true},
(err,res)=>{
    if(err) return console.error(err)
    app.listen(port,()=>{
        console.log(`Server is running on port ${port}`)
    })
}
)