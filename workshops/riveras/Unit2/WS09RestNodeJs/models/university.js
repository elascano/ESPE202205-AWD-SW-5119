const mongoose = require("mongoose");
const universitySchema = mongoose.Schema({
name:{
    type:String,
    required: true

},
typeU:{
    type:String,
    required: true
},
email:{
    type:String,
    required: true
},
city:{
    type:String,
    required:true
}




});

module.exports = mongoose.model('University', universitySchema);