const mongoose = require("mongoose");
const userSchema = mongoose.Schema({
name:{
    type:String,
    required: true

},
price:{
    type:Number,
    required: true
},
brand:{
    type:String,
    required: true
}




});

module.exports = mongoose.model('User', userSchema);