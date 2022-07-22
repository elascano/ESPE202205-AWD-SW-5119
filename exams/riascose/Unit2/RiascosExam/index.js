const express=require('express');
const axios=require('axios');
const path=require('path');
const port=3007;
const mongoose = require("mongoose");
const shoeRoute = require("./src/controller/soccerShoe");
require('dotenv').config();
const app=express();

app.use(express.static('src'));
app.use(express.json());
app.use("/riascosShoe", shoeRoute);
app.get('/',function(req,res){
    res.sendFile(path.join(_dirname,'./src/index.html'));
});

app.get('/auth',(req,res)=>{
    res.redirect(`https://github.com/login/oauth/authorize?client_id=${process.env.GITHUB_CLIENT_ID}`);
});

app.get('/oauth-callback',({query:{code}},res)=>{
    const body={
        client_id: process.env.GITHUB_CLIENT_ID,
        client_secret: process.env.GITHUB_SECRET,
        code,
    };
    const opts={headers: {accept: 'application/json'}};
    axios
        .post('https://github.com/login/oauth/access_token',body,opts)
        .then((_res)=>_res.data.access_token)
        .then((token)=>{
            console.log('My token',token);
            res.redirect(`/?token=${token}`);
        })
        .catch((err)=>res.status(500).json({err:err.message}));
});

mongoose
  .connect("mongodb+srv://root:admin@cluster0.1ewz4.mongodb.net/WebDataBase?retryWrites=true&w=majority")
  .then(() => console.log("Connected to MongoDB Atlas"))
  .catch((error) => console.error(error));

app.listen(port);
console.log(`App listening on port ${port}`);