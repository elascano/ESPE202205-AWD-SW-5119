const express = require('express');
const mongoose = require('mongoose');
const userRoutes=require("../routes/building")
//require("dotenv").config();
const app = express();
const port=process.env.PORT ||3000;

//middleware
app.use(express.json());
app.use('/api',userRoutes );

//routes
app.get("/",(req,res)=>{
    res.send("WELCOME TO MY API REST")
})

//conection
mongoose.connect("mongodb+srv://stalin0:admin@cluster0.hre2t1k.mongodb.net/?retryWrites=true&w=majority")
.then(()=>console.log("Connect to MongoDB")).catch((error)=>console.error(error));

app.listen(port, () => console.log('server  listening on port',port));