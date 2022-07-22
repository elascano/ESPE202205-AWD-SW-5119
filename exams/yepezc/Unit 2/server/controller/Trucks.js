const Truck = require('../model/Truck')

const getTruckById = (req,res) => {
    try{
        Truck.findOne({id: req.params.id}, (err,truck) =>{
            err && res.status(500).send(err.message)
            res.status(200).send(truck)
        })
    }
    catch(error){
        res.status(404).send({Error : "Truck not found"})
    }

}

module.exports = {getTruckById}