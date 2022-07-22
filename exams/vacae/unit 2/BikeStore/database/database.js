import mongoose from "mongoose";
const database= "BikeStore";
async function Conection (username, password){
    const URL= "mongodb+srv://"+username+":"+password+"@clusterawd.rbj5oin.mongodb.net/"+database+"?retryWrites=true&w=majority";
    try{
        await mongoose.connect(URL, {useUnifiedTopology:true, useNewUrlParser:true, });
        console.log("Connected to MongoDBAtlas successfully");
    }catch(error){
        console.log("Error with connect to the MongoDBAtlas: " + error);
    };

}

export default Conection;

