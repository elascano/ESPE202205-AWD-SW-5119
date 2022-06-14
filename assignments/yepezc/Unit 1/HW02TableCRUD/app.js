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
MongoClient.connect('mongodb+srv://christopher:movies123@cluster0.8wanr.mongodb.net/myFirstDatabase?retryWrites=true&w=majority', {
    useUnifiedTopology: true
  }, (err, client) => {
    if (err) return console.error(err)
    console.log('Connected to Database')
    const db = client.db('movie-data');
    const moviesCollection = db.collection('movie-data');
    app.post('/create', (req, res) => {
        if(req.body.movieName === ""){
            console.log("Not Valid");
            res.redirect("/");
            return;
            
        }
        moviesCollection.insertOne(req.body)      
        .then(result => {
            console.log(result);
            res.json('Success');
        })
        .catch(error => console.error(error))
    });

    app.get("/read",  (req,res) =>{    
        db.collection('movie-data').find().toArray()  
            .then(result => {
            res.json(result);
        })       
        .catch (error => console.error(error.message)) 
    });

    app.put("/update", (req , res) => {        
        moviesCollection.findOneAndUpdate(
            { movieName: req.body.movieName },
            {
            $set: {
                movieName: req.body.newMovieName,
                director: req.body.director,
                productor: req.body.productor,
                yearOfRealease: req.body.yearOfRealease,
                budget: req.body.budget
                }
            },
            {
            upsert: false
            }
        )
        .then(result => {
            console.log(result);
            res.json('Success');
        })
        .catch(error => console.error(error))
    });

    app.delete("/erase",(req,res) =>{
        moviesCollection.deleteOne(
            { movieName: req.body.movieName }
          )
            .then(result => {
                console.log(result);
                if (result.deletedCount === 0) 
                    return res.json('No quote to delete');
                else res.json(`Deleted Success`)
            })
        .catch(error => console.error(error))
    })
  })



app.listen(3000, () =>{
    console.log("server has started on port 3000");
});
