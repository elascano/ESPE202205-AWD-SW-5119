const jwt = require("../services/jwtokens");
const moment = require("moment");
const User = require("../models/user")

function willExpireToken(token){
    const { exp } = jwt.decodedToken(token);
    const currentDate = moment().unix();

    if(currentDate > exp){
        return true;
    }

    return false;
}

function refreshAccessToken(req, res){
    const { refresToken } = req.body;
    const isTokenExpired = willExpireToken(refresToken);

    if(isTokenExpired){
        res.status(404).send({ message: "El refreshToken ha expirado"});
    }else{
        const { id } = jwt.decodedToken(refresToken);
        
        User.findOne({_id: id}, (err,userStored) => {
            if(err){
                res.status(500).send({ message: "Error de servidor"});
            }else{
                if(!userStored){
                    res.status(404).send({ message: "Usuario no encontrado"});
                }else{
                    res.status(200).send({ 
                        accessToken: jwt.createAccessToken(userStored),
                        refresToken: refresToken
                    });
                }
            }
        });
    }
}

module.exports = {
    refreshAccessToken
};