const mongoose = require("mongoose");

const GlassesSchema = mongoose.Schema({
  
    serialNumber:{
        type: 'string',
        required: true,
      },
    
      brand:{
        type: 'string',
        required: true,
      },
      
    
      model:{
        type: 'string',
        required: true,
      },
    
      price:{
        type: 'string',
        required: true,
      }
})

module.exports = mongoose.model('glasses', GlassesSchema)