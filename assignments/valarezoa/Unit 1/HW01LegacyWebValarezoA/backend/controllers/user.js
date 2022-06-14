const bcrypt = require("bcrypt-nodejs");
const User = require("../models/user");
const jwt = require("../services/jwtokens");
const mongoose = require("mongoose");
const Schema = mongoose.Schema;
const TaskSchema = Schema({
    actividad: String,
    tiempo: String,
    creacion: String,
    descripción: String,
    subtareas: String,
    agendar: String,
    subCont1: String,
    subAct1: Boolean,
    subCont2: String,
    subAct2: Boolean,
    subCont3: String,
    subAct3: Boolean,
    subCont4: String,
    subAct4: Boolean,
    subCont5: String,
    subAct5: Boolean
});

function signUp(req, res){
    const user = new User();
    const { firstName, lastName, email, password} = req.body;

    user.firstName = firstName;
    user.lastName = lastName;
    user.email = email.toLowerCase();
    user.role = "user"
    user.active = true;

    if(!password){
        req.status(404).send({message: "Introdusca una contraseña"});
    } else {
        bcrypt.hash(password, null, null, function(err, hash){
            if(err){
                res.status(500).send({message: "Error al encriptar"});
            } else {
                user.password = hash;
                user.save((err, userStored) => {
                    if(err){
                        res.status(500).send({message: "El usuario ya existe"});
                    } else {
                        if(!userStored){
                            res.status(404).send({message: "Error al crear el usuario"});
                        } else {
                            res.status(200).send({user: userStored});
                            mongoose.model(user.email, TaskSchema);
                        }
                    }
                })
            }
        })
    }

}

function signIn(req, res){
    const params = req.body;
    const email = params.email.toLowerCase();
    const password = params.password;

    User.findOne({email},(err, userStored) => {
        if(err){
            res.status(500)
            .send({message: "Error del servidor"});
        }else {
            if(!userStored){
                res.status(404)
                .send({message: "Usuario no encontrado"});
            }else{
                bcrypt.compare(password, userStored.password, (err,check) => {
                    if(err){
                        res.status(500)
                        .send({message: "Error del servidor"});
                    }else if(!check){
                        res.status(404)
                        .send({message: "Contraseña incorrecta"});
                    }else{
                        if(!userStored.active){
                            res.status(200)
                            .send({message: "Usuario baneado"});
                        }else{
                            res.status(200)
                            .send({
                                accessToken: jwt.createAccessToken(userStored),
                                refreshToken: jwt.createRefreshToken(userStored)
                            });
                        }
                    }
                })
            }
        }
    })
}

module.exports = {
    signUp,
    signIn,
    TaskSchema
};