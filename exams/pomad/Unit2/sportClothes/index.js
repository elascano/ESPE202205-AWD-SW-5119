const express = require('express');
const app = express();
const mongoose = require('mongoose');

require('dotenv/config');


var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));


// //Import Routes
const sportRoute = require('./src/routes/clothes');

app.use('/sportShop/clothes', sportRoute);

//Routes
app.get('/', (req, res)=>{
    res.send('We are on home');
})

// Connect to DB
mongoose.connect(process.env.DB_CONNECTION);
const database = mongoose.connection;

database.on('error', (error) => {
    console.log(error)
})

database.once('connected', () => {
    console.log('Database Connected');
})




// How to start listening to the server
app.listen(3006);