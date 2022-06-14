const express = require('express');
const mongoose = require('mongoose');
const userRoutes=require("./routes/user")
//require("dotenv").config();
const app = express();
const port=process.env.PORT ||9000;

//middleware
app.use(express.json());
app.use('/api',userRoutes );



//reutes
app.get("/",(req,res)=>{
    res.send("WELCOME TO MY APhenr")
})

//conection
mongoose.connect("mongodb+srv://student:1234@cluster0.n0fcgad.mongodb.net/?retryWrites=true&w=majority")
.then(()=>console.log("Connect to MongoDB Atlas")).catch((error)=>console.error(error));



app.listen(port, () => console.log('server  listening on port',port));


