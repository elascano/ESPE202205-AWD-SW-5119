/*Universidad de las Fuerzas Armadas "ESPE"
Advanced Web Programming
Author: Christopher Daniel Yépez Chandi
HW02 TableCRUD
Uptade Date: 15/05/2022 */

const express = require("express");
const app = express(); 
const cors = require("cors");

app.use(cors());
app.use(express.json());

const bodyParser= require('body-parser');

const path = require('path');
const { json } = require("body-parser");
app.use(express.static("public"));
app.use(bodyParser.urlencoded({ extended: true }))

const MongoClient = require('mongodb').MongoClient;
MongoClient.connect('mongodb+srv://admin:admin@cluster0.uxgwiwo.mongodb.net/?retryWrites=true&w=majority', {
    useUnifiedTopology: true
  }, (err, client) => {
    if (err) return console.error(err)
    console.log('Connected to Database')
    const db = client.db('Node-Workshop');

    const collectionTraffic = db.collection('traffic');
    const collectionTrucks =db.collection('trucks');

    app.post('/trucks', (req, res) => {
        if(req.body === ""){
            console.log("Not Valid");
            res.redirect("/");
            return;
            
        }
        collectionTrucks.insertOne(req.body)      
        .then(result => {
            console.log(result);
            res.json('Success');
        })
        .catch(error => console.error(error))
    });

    app.post('/traffic', (req, res) => {
        if(req.body === ""){
            console.log("Not Valid");
            res.redirect("/");
            return;
            
        }
        collectionTraffic.insertOne(req.body)      
        .then(result => {
            console.log(result);
            res.json('Success');
        })
        .catch(error => console.error(error))
    });


    //method GET with Traffic
    app.get("/traffic",  (req,res) =>{    
        collectionTraffic.find().toArray()  
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
        collectionTraffic.find({id:parseInt(id)}).toArray()
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
