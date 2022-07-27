const mongoose = require('mongoose');

async function Connection (){
    const URL= "mongodb+srv://admin:admin@cluster0.pukdr.mongodb.net/Exam?retryWrites=true&w=majority";
    try{
        await mongoose.connect(URL, {useUnifiedTopology:true, useNewUrlParser:true, });
        console.log("Connected to MongoDBAtlas successfully");
    }catch(error){
        console.log("Error with connect to the MongoDBAtlas: " + error);
    };
}

module.exports = Connection;