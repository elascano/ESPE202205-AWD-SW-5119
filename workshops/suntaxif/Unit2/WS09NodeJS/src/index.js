const express = require('express');
const mongoose = require('mongoose');
const shoesRoutes=require("./routes/user")
//require("dotenv").config();
const app = express();
const port=process.env.PORT ||9000;

//middleware
app.use(express.json());
app.use('/api',shoesRoutes);



//reutes
app.get("/",(req,res)=>{
    res.send("WELCOME TO MY APhenr")
})

//conection
mongoose.connect("mongodb+srv://admin:admin@cluster0.pukdr.mongodb.net/WS09?retryWrites=true&w=majority")
.then(()=>console.log("Connect to MongoDB Atlas")).catch((error)=>console.error(error));



app.listen(port, () => console.log('server  listening on port',port));


