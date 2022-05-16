// JavaScript source code
const {Client} = require("pg");
var mark = String(document.getElementById("shirtMark").value);
var model = document.getElementById("shirtModel").value;
var size = document.getElementById("shirtSize").value;
var color = document.getElementById("shirtColor").value;
var price = String(document.getElementById("shirtPrice").value);
var dataInsert = "insert into camisas(marca,modelo,talla,color,precio) values (" + mark + ',' + model + ',' + size + ',' + color + ',' + price + ')';
const client=new Client({
    user: 'postgres',
    host: 'localhost',
    database: 'postgres',
    password: '010901',
    port: 5432,
});

async function saveShirt() {
    await client.connect();
    var numRows = client.query('select * from camisas').rowCount;
    await client.query(dataInsert);
    var numColumns = 5;
    for (var i = 0; i < numRows; i++) {
        shirtsTable += "<tr>"
        for (var j = 0; i < numColumns; j++) {
            shirtsTable += "<td class=\"tableContent\">" + String((await client.query('select * from camisas')).rows[i].marca) + String((await client.query('select * from camisas')).rows[i].modelo) + String((await client.query('select * from camisas')).rows[i].talla) + String((await client.query('select * from camisas')).rows[i].color) + String((await client.query('select * from camisas')).rows[i].precio) + "</td>";
        }
        shirtsTable += "</tr>"
    }
    shirtsTable += "</table>";
    await client.end();
}

saveShirt();

async function updateShirt() {
    var dataUpdate = "update into camisas(marca,modelo,talla,color,precio) values (" + mark + ',' + model + ',' + size + ',' + color + ',' + price + ')';
    client.query("Delete * from camisas where")
}

async function deleteShirt() {
    client.query("delete * from camisas where marca=" + mark + ";");
}

function generateTable() {
    var shirtsTable = "<table id=\"shirtsTable\" class=\"dataTable\"><tr><td class=\"tableHeader\">MARCA</td><td class=\"tableHeader\">MODELO</td><td class=\"tableHeader\">TALLA</td><td class=\"tableHeader\">COLOR</td><td class=\"tableHeader\">PRECIO</td><td class=\"tableHeader\">OPCIONES</td></tr>";
    var tableContainer = document.getElementById("dataTable");
    try {
        saveShirt();
    }catch(e){
        alert("Error BDD");
    }
    tableContainer.innerHTML = shirtsTable;
}


