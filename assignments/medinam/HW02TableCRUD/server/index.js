/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Martín Andrés Medina Armijos
HW02 TableCRUD
Creation Date: 14/05/2022
Uptade Date: 15/05/2022 */

const mongoose = require("mongoose");
const app = require("./App");
const port = process.env.PORT || 3977;
const { API_VERSION } = require("./config");
const PORT_DB = 27017;

//useNewUrlParser and useUnifieldTopology set for a correct use of MongoDB

mongoose.connect(`mongodb://${"localhost"}:${PORT_DB}/rabbitsDB`,
{useNewUrlParser: true, useUnifiedTopology: true},
(err, res) => {
    if(err){
        throw err;
    } else {
        console.log("Conecciona a la base de datos es correcta");
        app.listen(port, () => {
            console.log("####################");
            console.log("###### API REST#####");
            console.log("####################");
            console.log(`http://${"localhost"}:${port}/api/${API_VERSION}/`);
        })
    }
});