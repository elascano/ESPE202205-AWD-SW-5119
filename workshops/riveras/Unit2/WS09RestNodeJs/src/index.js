const express = require('express');
const mongoose = require('mongoose');
const userRoutes=require("../routes/university")
//require("dotenv").config();
const app = express();
const port=process.env.PORT ||9000;

//middleware
app.use(express.json());
app.use('/api',userRoutes );



//routes
app.get("/",(req,res)=>{
    res.send("WELCOME TO MY APIRest")
})

//conection
mongoose.connect("mongodb")
.then(()=>console.log("Connect to MongoDB")).catch((error)=>console.error(error));



app.listen(port, () => console.log('server  listening on port',port));