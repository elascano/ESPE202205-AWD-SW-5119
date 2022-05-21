/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Martín Andrés Medina Armijos
HW02 TableCRUD
Creation Date: 14/05/2022
Uptade Date: 15/05/2022 */

const express = require("express");
const RabbitController = require("../controllers/rabbits_controller");

const api = express.Router();


api.post("/create",RabbitController.createRabbit);
api.post("/delete",RabbitController.deleteRabbit);
api.get("/findAll",RabbitController.findAllRabbits);
api.get("/find-name",RabbitController.findRabbit);
api.post("/update",RabbitController.updateRabbit);

module.exports = api;