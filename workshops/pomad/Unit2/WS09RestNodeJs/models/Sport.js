const mongoose = require('mongoose');

const PostSchema = mongoose.Schema({
    id: {
        required: true,
        type: Number
    },
    name: {
        required: true,
        type: String
    },
    description: {
        required: true,
        type: String
    },
    origen: {
        required: true,
        type: String
    }
});

module.exports = mongoose.model('sport', PostSchema);