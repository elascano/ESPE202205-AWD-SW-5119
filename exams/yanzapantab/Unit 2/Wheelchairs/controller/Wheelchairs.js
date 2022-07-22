const Wheelchairs = require('../model/Wheelchairs')


const getWheelchairs = (req,res) => {
    Wheelchairs.find((err,wheelchairs) =>{
        err && res.status(500).send(err.message)
        res.status(200).json(wheelchairs)
    })
}


module.exports = {getWheelchairs}