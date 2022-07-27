const mongoose = require("mongoose");

const userSchema = mongoose.Schema({


idMar:{
    type:Number,
    required:true
},
brand:{
    type:String,
    required:true

},
size:{
    type:Number,
    required:true
},
amount:{
    type:Number,
    required:true
}




});

module.exports=mongoose.model('Markers',userSchema);