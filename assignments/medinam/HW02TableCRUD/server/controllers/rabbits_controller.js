/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Martín Andrés Medina Armijos
HW02 TableCRUD
Creation Date: 14/05/2022
Uptade Date: 15/05/2022 */


const mongoose = require("mongoose");
const Schema = require("../models/rabbit_model")


function createRabbit(req, res) {

    const { name, color, age, skips_per_minute } = req.body;
    const Rabbit = mongoose.model("rabbits", Schema.RabbitSchema);
    const rabbit = Rabbit();
    rabbit.name = name;
    rabbit.color = color;
    rabbit.age = age;
    rabbit.skips_per_minute = skips_per_minute;

    rabbit.save((err, rabbitStored) => {
        if (err) {
            res.status(500).send({ message: "Rabbits exist" });
        } else {
            if (!rabbitStored) {
                res.status(404).send({ message: "Error 404" });
            } else {
                res.status(200).send({ rabbit: rabbitStored });
            }
        }
    })
};


function findAllRabbits(req, res) {

    const Rabbit = mongoose.model("rabbits", Schema.RabbitSchema);

    Rabbit.find().then(rabbit => {
        if (!rabbit) {
            res.status(404).send({ message: "Don't exist rabbits" });
        } else {
            res.status(200).send({ rabbit });
        }
    })

};


function findRabbit(req, res) {

    const query = req.query;
    const Rabbit = mongoose.model("rabbits", Schema.RabbitSchema);

    Rabbit.find({ name: query.name }, (err, rabbitStored) => {
        if (err) {
            res.status(500).send({ message: "Rabbits exist" });
        } else {
            if (!rabbitStored) {
                res.status(404).send({ message: "Error 404" });
            } else {
                res.status(200).send({ rabbit: rabbitStored });
            }
        }
    })
};


function updateRabbit(req, res) {

    const { name, color, age, skips_per_minute } = req.body;
    const Rabbit = mongoose.model("rabbits", Schema.RabbitSchema);

    Rabbit.updateOne({ name: name }, { color: color, age: age, skips_per_minute: skips_per_minute },
        (err, rabbitStored) => {
            if (err) {
                res.status(500).send({ message: "Rabbits exist" });
            } else {
                if (!rabbitStored) {
                    res.status(404).send({ message: "Error 404" });
                } else {
                    res.status(200).send({ rabbit: rabbitStored });
                }
            }
        })
};


function deleteRabbit(req, res) {

    const { name, color, age, skips_per_minute } = req.body;
    const Rabbit = mongoose.model("rabbits", Schema.RabbitSchema);

    Rabbit.findOneAndRemove({ name: name, color: color, age: age, skips_per_minute: skips_per_minute },
        (err, rabbitStored) => {
            if (err) {
                res.status(500).send({ message: "Rabbits exist" });
            } else {
                if (!rabbitStored) {
                    res.status(404).send({ message: "Error 404" });
                } else {
                    res.status(200).send({ rabbit: rabbitStored });
                }
            }
        })
};


module.exports = {
    createRabbit,
    findAllRabbits,
    findRabbit,
    deleteRabbit,
    updateRabbit
};