const express = require("express");
const bodyParser = require("body-parser");

const app = express();
const {API_VERSION} = require("./config");

//Load routings
const userRoutes = require("./routers/user");
const taskRoutes = require("./routers/task");
// ....

app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());

//Configure Header HTTP
// ....

// Route Basic
app.use(`/api/${API_VERSION}`,userRoutes);
app.use(`/api/${API_VERSION}`,taskRoutes);
// ....

module.exports = app;