import User from '../userSchema/userSchema.js';
import Bike from '../userSchema/bikeSchema.js';

export const getbike = async (request, response) => {
    try {

        const bike = await Bike.findOne({ bikeId: request.params.bikeId });
        response.status(200).json(bike);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

