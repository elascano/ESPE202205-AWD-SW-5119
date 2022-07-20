require('dotenv').config();
const express = require('express');
const app = express()
const port = 3001;
const mongoose = require('mongoose');
const aboutDataRouter = require('./routes/aboutDataRoutes');
const faunaRouter = require('./routes/faunaRoutes');




mongoose.connect(process.env.DATABASE_URL, { useNewUrlParser: true })
const db = mongoose.connection
db.on('error', (error) => console.error(error))
db.once('open', () => console.log('Connected to Database'))


app.use(express.json());


app.use('/ChocoAndino', aboutDataRouter);

app.use('/ChocoAndino', faunaRouter);

app.use('/ChocoAndino', faunaRouter);

app.use('/ChocoAndino', faunaRouter);


app.listen(port, () => console.log('Server Started on port ' + port))