const express = require("express");
const mongoose = require("mongoose");
require("dotenv").config();
const playerRoute = require("./routes/sportBalls");

// settings
const app = express();
const port = process.env.PORT || 3008;

// middlewares
app.use(express.json());
app.use("/sportBalls", playerRoute);

// routes
app.get("/", (req, res) => {
  res.send("Hi Santiago");
});

// mongodb connection
mongoose
  .connect("mongodb+srv://santi10:santi10@cluster0.q7oou.mongodb.net/Exam2?retryWrites=true&w=majority")
  .then(() => console.log("Connected to MongoDB Atlas"))
  .catch((error) => console.error(error));

// server listening
app.listen(port, () => console.log("Server listening to", port));
