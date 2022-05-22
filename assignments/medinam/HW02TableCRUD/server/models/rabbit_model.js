/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Martín Andrés Medina Armijos
HW02 TableCRUD
Creation Date: 14/05/2022
Uptade Date: 15/05/2022 */

const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const RabbitSchema = Schema({
    name: String,
    color: String,
    age: Number,
    skips_per_minute: Number
})

module.exports = {
    RabbitSchema
}