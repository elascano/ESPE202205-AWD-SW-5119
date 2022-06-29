const express = require('express');
const axios = require('axios');
const path = require('path');
require('dotenv').config();

const app = express();
const port = 3000;

app.use(express.static('src'));

app.get('/', function(req, res){
    res.sendFile(path.join(__dirname, './src/index.html'))
});

app.get('/auth', (req, res)=>{
    res.redirect(
    `https://github.com/login/oauth/authorize?client_id=${process.env.GITHUB_CLIENT_ID}`,

    );
});

app.get('/oauth-callback',({query:{code}}, res)=>{
    const body = {
        clien_id: process.env.GITHUB_CLIENT_ID,
        client_secret: process.env.GITHUB_SECRET,
        code,
    };
    const opts = {headers: {accept:'application/json'}}; 
    axios
        .post('https://github.com/login/oauth/access_token', body, opts)
        .then((_res)=>_res.data.access_token)
        .then((token)=>{
            console.log('My token', token);
            res.redirect(`/?token=${token}`);
        })
        .catch((err)=>res.status(500).json({err:err.message}));
});

app.listen(port);
console.log(`App listening on port ${port}`);