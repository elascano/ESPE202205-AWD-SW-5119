const express = require('express');
const routes = require('./routes/rout');
const connection = require('./connection/atlasdb');
const dotenv = require('dotenv');
dotenv.config();

const app = express();
const port = 3013;

//middleware
app.use(express.json());
app.use('/shoesDepartament/casualShoes', routes);
connection();



app.get('/', (req, res) => {
    res.send("MI API");
})

app.listen(port, () => {
    console.log(`server in a port ${port}`)
});

