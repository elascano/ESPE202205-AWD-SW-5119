const fs = require("fs/promises");
const express = require("express");
const cors = require("cors");
const _ = require("lodash");
const { v4: uuid } = require("uuid");
const { response } = require("express");

const app = express();

app.use(express.json());


app.get("/getmeabadjoke",(req,res)=>{
    const chistes = ["What did the grape say when it was stepped on? Nothing, it just let out a little wine.",
    "I was wondering why the baseball was getting bigger. Then it hit me.",
    "I'm thinking of reasons to go to Switzerland. The flag is a big plus.",
    "A burger walks into a bar. The bartender says 'Sorry, we don't serve food here",
    "When my son told me to stop impersonating a flamingo, I had to put my foot down.",
    "What's brown and sticky? A stick.",
    "Why can't a bicycle stand on its own? It's two-tired."];

    res.json({
        badJoke: _.sample(chistes)
    })

})

app.get("/getSomethingId/:id",async(req,res)=>{
    const id  = req.params.id;
    let content;

    try {
        console.log(id);
        content = await fs.readFile(`data/something/${id}.txt`,"utf-8");
    } catch (err) {
        return res.sendStatus(404);
    }

    res.json({
        content: content
    });
    
})

app.post("/postSomething",async(req,res)=>{
    const id = uuid();
    const contents = req.body.something;

    if(!contents){
        return res.sendStatus(400);
    }

    await fs.mkdir("data/something", {recursive:true});
    await fs.writeFile(`data/something/${id}.txt`,contents);

    res.status(201).json({
        id:id
    })

})

app.listen(3000, ()=> console.log("Api corriendo.."));