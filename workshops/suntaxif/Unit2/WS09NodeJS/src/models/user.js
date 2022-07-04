const mongoose = require("mongoose");
const shoesSchema = mongoose.Schema({
id:{
    type:Number,
    required:true

},
trademark:{
    type:String,
    required:true
},
size:{
    type:Number,
    required:true
},
price:{
    type:Number,
    required:true
}
});

module.exports=mongoose.model('Shoes',shoesSchema);