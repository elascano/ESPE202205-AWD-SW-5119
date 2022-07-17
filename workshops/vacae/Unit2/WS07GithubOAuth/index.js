
const path = require('path');
const express = require('express');
require('dotenv').config();

const app = express();
const port = 3000;
const axios = require('axios');

app.use(express.static('src'));
app.get('/', (req, res)=>{
    res.sendFile(path.join(__dirname,'./src/index'));
});
app.get('/auth', (req,res)=>{
    res.redirect(
        `https://github.com/login/oauth/authorized?client_id=${process.env.GITHUB_CLIENT_ID}`,);
});

app.get('/oauth-callback',({query:{code}},res)=>{
    const body={
        client_i: process.env.GITHUB_CLIENT_ID,
        client_secret: process.env.GITHUB_SECRET,
        code,
    };
    const opts ={header: {accept: 'application/json'}};
    axios
        .post('https://github.com/login/oauth/access_token', body, opts)
        .then((_res)=> _res.data.access_token)
        .then((token)=> {
            console.log('My token', token);
            res.redirect(`/?token=${token}`);
        })
        .catch((err)=> res.status(500).json({err:err.message}));

})
app.listen(port);
console.log(`App listening on port ${port}`);

