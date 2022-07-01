const express = require("express");
const app = express(); 

app.use(express.json());

const bodyParser= require('body-parser');

app.use(bodyParser.urlencoded({ extended: true }))

const MongoClient = require('mongodb').MongoClient;
MongoClient.connect('mongodb+srv://admin:admin@cluster0.uxgwiwo.mongodb.net/?retryWrites=true&w=majority', {
    useUnifiedTopology: true
  }, (err, client) => {
    if (err) return console.error(err)
    console.log('Connected to Database')
    const db = client.db('Node-Workshop');
    const collection = db.collection('traffic');
    const collectionTrucks =db.collection('trucks');
    //method GET with Traffic
    app.get("/traffic",  (req,res) =>{    
        collection.find().toArray()  
            .then(result => {
            res.json(result);
        })       
        .catch (error => console.error(error.message)) 
    });

    app.get("/trucks",  (req,res) =>{    
        collectionTrucks.find().toArray()  
            .then(result => {
            res.json(result);
        })       
        .catch (error => console.error(error.message)) 
    });

    app.get("/traffic/:id",  (req,res) =>{    
        const { id } = req.params;
        collection.find({id:parseInt(id)}).toArray()
            .then(result => {
            res.json(result);
        })       
        .catch (error => console.error(error.message)) 
    });
    app.get("/trucks/:id",  (req,res) =>{    
        const { id } = req.params;
        collectionTrucks.find({id:parseInt(id)}).toArray()
            .then(result => {
            res.json(result);
        })       
        .catch (error => console.error(error.message)) 
    });
  })

app.listen(3000, () =>{
    console.log("server has started on port 3000");
});
