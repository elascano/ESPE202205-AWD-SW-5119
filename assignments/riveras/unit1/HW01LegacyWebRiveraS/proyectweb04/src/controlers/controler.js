const pool = require("../db");

const getAllOrders = async (req, res, next) => {
    try {
        const allOrders = await pool.query('SELECT * FROM productst')
        res.json(allOrders.rows)
    } catch (error) {
        next(error);
    }
}

const getOrder = async (req, res, next) => {
    try {
        const {id} = req.params
        const result = await pool.query('SELECT * FROM productst WHERE tipo = $1',[id])
    
        if(result.rows.length === 0)
        return res.status(404).json({
            message: "Orden no encontrada"
        });
        res.json(result.rows[0]);
    } catch (error) {
        next(error);
    }
}

const createOrder = async (req, res, next) => {
    const {clase, tipo, precio} = req.body
    try {
        const result = await pool.query("INSERT INTO productst (clase, tipo, precio) VALUES ($1, $2, $3) RETURNING *", [
            clase,
            tipo,
            precio
        ])
        res.json(result.rows[0]);
    } catch (error) {
        next(error);
    }
}

const deleteOrder = async (req, res, next) => { 
    const{id} = req.params;
    try {
        const result = await pool.query("DELETE FROM productst WHERE tipo = $1",[id])
        if (result.rowCount === 0)
            return res.status(404).json({
                message: "Orden no encontrada"
            });
        return res.sendStatus(204);
    } catch (error) {
        next(error);
    }
}

const updateOrder = async (req, res, next) => {
    try {
        const {id} = req.params;
        const {clase, precio} = req.body;
    
        const result = await pool.query(
            "UPDATE productst SET clase = $1, precio = $2 WHERE tipo = $3 RETURNING *",
            [clase, precio, id]
        )
    
        if(result.rows.length === 0)
        return res.status(404).json({
            message: "Orden no encontrada"
        })
        return res.json(result.rows[0])
    } catch (error) {
        next(error)
    }
}

///////////////////////////////

const getLogin = async (req, res, next) => {
    try {
        const {id} = req.params
        const result = await pool.query('SELECT * FROM usert WHERE nick = $1',[id])
    
        if(result.rows.length === 0)
        return res.status(404).json({
            message: "Usuario no encontrado"
        });
        res.json(result.rows[0]);
    } catch (error) {
        next(error);
    }
}

const getAllDrinks = async (req, res, next) => {
    try {
        const allDrinks = await pool.query('SELECT * FROM productst')
        res.json(allDrinks.rows)
    } catch (error) {
        next(error);
    }
}

module.exports = {
    getAllOrders,
    getOrder,
    createOrder,
    deleteOrder,
    updateOrder,
    getLogin,
    getAllDrinks
}