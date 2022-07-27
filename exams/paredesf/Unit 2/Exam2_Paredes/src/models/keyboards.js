const mongoose = require ("mongoose");

const userSchema = mongoose.Schema({

    id:{
        type: Number,
        required: true
    },

    brand:{
        type: String,
        required: true
    },

    color:{
        type: String,
        required: true
    },

    price:{
        type: Number,
        required: true
    }

})

module.exports = mongoose.model('items', userSchema)