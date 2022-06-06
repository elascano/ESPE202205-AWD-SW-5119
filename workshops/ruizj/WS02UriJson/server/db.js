const Pool = require("pg").Pool;

const pool = new Pool({
    user:"postgres",
    password:"christopher0909",
    host:"localhost",
    port : 5432,
    database: "Restaurante"
});

module.exports = pool;