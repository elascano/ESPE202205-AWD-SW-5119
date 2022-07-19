const mongoose = require("mongoose");
const buildingSchema = mongoose.Schema({
id:{
    type:String,
    required: true

},
owner:{
    type:String,
    required: true
},
address:{
    type:String,
    required: true
},
price:{
    type:String,
    required:true
}
});

module.exports = mongoose.model('Building', buildingSchema);