const express = require('express');
const app = express();
const json = require('./vinylrecords.json') 

app.set('port', 3000);

app.get('/', (req, res) =>{
    return res.send('El API se esta ejecutando !!!');
}); 

app.get('/getAll', (req,res) => {
    return res.send(json);
});

app.get('/getByID/:id?', (req,res) => {
    const id = req.params.id;
    let response = null;
    
    if(id){
        json.filter(element => {
            if(element.id = id){
                response = element;
            }
        });
        return res.send(response);
    }
    return res.send(response);
});

app.post('/addItem', (req,res)=>{
    const body = req.body;

    json.push(body);

    return res.send(json);

});

app.listen(app.get('port'), () => {
    console.log(`El servidor esta escuchando en el puerto: ${app.get('port')}`);
});
