const express = require("express");
const UserController = require("../controllers/user");
const TaskController = require("../controllers/task");

const api = express.Router();

api.post("/registro",UserController.signUp);
api.post("/iniciar",UserController.signIn);
api.post("/crear",TaskController.createTask);



module.exports = api;