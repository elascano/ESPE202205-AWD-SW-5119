const express = require('express')
const router = express.Router()

const ferreteriaController = require('../controller/ferreteriaController')

//Mostrar todos los alumnos (GET)
router.get('/', ferreteriaController.mostrar)
//Crear alumno (POST)
router.post('/crear', ferreteriaController.crear)
//Editar alumno (POST)
router.post('/editar', ferreteriaController.editar)
//Borrar alumno (GET)
router.get('/borrar/:id', ferreteriaController.borrar)
module.exports = router