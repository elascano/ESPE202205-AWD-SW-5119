const jwt = require("jwt-simple");
const moment = require("moment");

const SECRET_KEY = "hamateam"


function createAccessToken(user){
    const payload = {
        id: user._id,
        firstname: user.firstName,
        lastName: user.lastName,
        email: user.email,
        role: user.role,
        createToken: moment().unix(),
        exp: moment().add(3, "hours").unix()
    };
    return jwt.encode(payload, SECRET_KEY);
};

function createRefreshToken(user){
    const payload = {
        id: user._id,
        exp: moment().add(30, "days").unix()
    };

    return jwt.encode(payload, SECRET_KEY);
};

function decodedToken(token){
    return jwt.decode(token, SECRET_KEY, true);
};

module.exports = {
    decodedToken,
    createRefreshToken,
    createAccessToken
};