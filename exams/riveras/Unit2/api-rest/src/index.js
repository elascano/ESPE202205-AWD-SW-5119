const express = require("express");
const mongoose = require("mongoose");
require("dotenv").config();
const Glasses = require("./routes/Glasses")

const app = express();
const port = process.env.PORT || 3001;
var cors = require('cors');
app.use(cors());

app.use(express.json());
app.use(Glasses);

mongoose
.connect(process.env.MONGODB_URI)
.then(()=> console.log("Connected to MongoDB Atlas"))
.catch((error) => console.error(error));

app.listen(port, () => console.log("server is listening on port", port));
