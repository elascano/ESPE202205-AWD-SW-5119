const express =require('express');
const app = express();
const mongoose= require('mongoose');
const bodyParser = require('body-parser');
app.use(bodyParser.urlencoded({extended:true}))

mongoose.connect("mongodb+srv://SyndeNathan:athalie2001@cluster0.3jfol.mongodb.net/notesDB",
{useNewUrlParser:true},{useUnifiedTopology:true})

const notesSchema={
    phoneCode:String,
    phoneBrand:tring,
    ram:String,
    price:String,
    storage:tring
}

const Note= mongoose.model("Note",notesSchema);
app.get('/',function(req,res)
{
   res.sendFile(__dirname+ "/index.html");
})

app.listen(3000,function(){
    console.log("server is running on 3000");
})
app.post("/",function(req,res){
    let newNote=new Note({
        phoneCode:req.body.phoneCode,
        phoneBrand:req.body.phoneBrand,
        ram:req.body.ram,
        price:req.body.price,
        storage:req.body.storage
    });
    newNote.save();
    res.redirect('/');
})