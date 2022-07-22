const mongoose = require ("mongoose");

const ClothesSchema = mongoose.Schema({

    id:{
        type: 'string',
        required: true
    },

    brand:{
        type: 'string',
        required: true
    },

    size:{
        type: 'number',
        required: true
    },

    color:{
        type: 'string',
        required: true
    },    
    type:{
        type: 'string',
        required: true
    },

})

module.exports = mongoose.model('clothes', ClothesSchema)