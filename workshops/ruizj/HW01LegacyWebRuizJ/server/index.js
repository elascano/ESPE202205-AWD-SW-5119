const express = require("express");
const app = express();
const cors = require("cors");
const pool = require("./db");

//middleware
app.use(cors());
app.use(express.json()); //req.body

//ROUTES RESERVACIONES//

//CREATE 
app.post("/todos", async(req,res) => {
    try {
        const {Description} = req.body;
        const newTodo = await pool.query(
            "Insert INTO todo(Description) VALUES ($1) RETURNING *",
            [Description]
        );

        res.json(newTodo);

    } catch (error) {
        console.error(error.message);
    }
});
app.post("/reservaciones", async (req,res) =>{
    //await
    try{
        const {Nombre} = req.body;
        const {Email} = req.body;
        const {Telefono} = req.body;
        const { Motivo } = req. body;
        const {Dia } = req.body;
        const { Hora} = req.body;
        const {Comentarios} = req.body;
        const newReservaciones = await pool.query(
            "INSERT INTO reservaciones(Nombre_res, Email_res, Telefono_res, Motivo, Dia_res, Hora_res , Comentarios) VALUES($1,$2,$3,$4,$5,$6,$7) RETURNING * ",
            [Nombre, Email, Telefono, Motivo, Dia, Hora, Comentarios]
        );
       
        res.json(newReservaciones);
    }
    catch(err){
        console.error(err.message);
    }
})

// GET ALL TODOS
app.get("/todos", async(req,res) =>{
    try {
        const allTodos = await pool.query("SELECT * FROM todo");
        res.json(allTodos.rows);
    } catch (error) {
        console.error(error.message);
    }
})
//GET A TODO
app.get("/todos/:id", async(req,res) =>{
    try {

        const { id } = req.params;
        const todo = await pool.query("SELECT * FROM todo WHERE todo_id =$1 ",[id])

        res.json(todo.rows[0]);

    } catch (error) {
        console.error(error.message);
    }
})

//UPDATE A TODO
app.put("/todos/:id", async(req,res) =>{
try {
    const { id } = req.params;
    const { description } = req.body;
    const updateTodo = await pool.query(
        "UPDATE todo SET description = $1 WHERE todo_id = $2",[description,id]);

    res.json("Todo was updated!");

} catch (error) {
    console.error(error.message);
}

})


//DELETE A TODO
app.delete("/todos/:id",async(req,res)=>{
    try {
        const { id } = req.params;
        const deleteTodo = await pool.query("DELETE FROM todo WHERE todo_id = $1",[id]);
        res.json("Todo was deleted");
    } catch (error) {
        console.log(error.message)
    }
})

app.listen(5000, () =>{
    console.log("server has started on port 5000");
});