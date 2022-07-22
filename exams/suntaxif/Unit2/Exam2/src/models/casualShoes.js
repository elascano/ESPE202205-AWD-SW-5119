const mongoose = require('mongoose');

const casualShoes = mongoose.Schema  ({
    id: {
        type: Number,
        required: true
    },
    brand: {
        type: String,
        required: false
    },
    size: {
        type: Number,
        required: false
    },
    price: {
        type: Number,
        required: false
    }
});

module.exports = mongoose.model('casualshoes',casualShoes); 