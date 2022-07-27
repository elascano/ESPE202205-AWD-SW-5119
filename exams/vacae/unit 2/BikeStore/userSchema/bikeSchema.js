import mongoose from "mongoose";

const bikeSchema =mongoose.Schema({
    id : Number,
    bikeId: Number,
    brand: String,
    price: Number,
    category: String,
});

const collection= "bikes";
const Bike =mongoose.model(collection, bikeSchema);

export default Bike;