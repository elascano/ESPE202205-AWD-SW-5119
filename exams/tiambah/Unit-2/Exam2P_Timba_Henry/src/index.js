const express = require('express');
const mongoose = require('mongoose');
const user = require('./models/user');
const userRoutes=require("./routes/user")
const cors = require('cors');

//require("dotenv").config();
const app = express();
const port=process.env.PORT ||9000;

//middleware
app.use(express.json());
app.use('/compani',userRoutes );
app.use(cors())



//reutes
app.get("/",(req,res)=>{
    res.send("WELCOME TO MY APhenr")
})

//conection

mongoose.connect("mongodb+srv://student:1234@cluster0.n0fcgad.mongodb.net/EXAM?retryWrites=true&w=majority")

.then(()=>console.log("Connect to MongoDB Atlas")).catch((error)=>console.error(error));



app.listen(port, () => console.log('server  listening on port',port));


