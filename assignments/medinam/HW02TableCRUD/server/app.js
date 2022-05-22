/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Martín Andrés Medina Armijos
HW02 TableCRUD
Creation Date: 14/05/2022
Uptade Date: 15/05/2022 */

const express = require("express");
const bodyParser = require("body-parser");

const app = express();

//Securiry CORS
var cors = require('cors');

app.use(cors());

const { API_VERSION } = require('./config');

//Load routings
const userRoutes = require("./routes/rabbit_routes");

app.use(bodyParser.urlencoded({ extended: false}));
app.use(bodyParser.json());

// Route Basic API
app.use(`/api/${API_VERSION}`,userRoutes);

module.exports = app;