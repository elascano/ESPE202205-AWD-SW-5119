const Ferreteria = require('../model/Ferreteria')

//Mostrar
module.exports.mostrar = (req, res)=>{
    Ferreteria.find({}, (error, ferreterias)=>{
        if(error) {
            return res.status(500).json({
                message: 'Error al mostrar las herramientas'
            })
        }
        return res.render('index', {ferreterias: ferreterias})
    })
}

//Crear
module.exports.crear = (req, res)=>{
    //console.log(req.body)
    const ferreteria = new Ferreteria({
        nombre: req.body.nombre,
        precio: req.body.precio,
        cantidad: req.body.cantidad,
        stock: req.body.stock,
        marca: req.body.marca
    })
    ferreteria.save(function(error,ferreteria){
        if(error){
            return res.status(500).json({
                message: 'Error al crear la herramienta'
            })
        }
        res.redirect('/')
    })
}

//Editar
module.exports.editar = (req,res)=>{
    const id = req.body.id_editar
    const nombre = req.body.nombre_editar
    const precio = req.body.precio_editar
    const cantidad = req.body.cantidad_editar
    const stock = req.body.stock_editar
    const marca = req.body.marca_editar
    Ferreteria.findByIdAndUpdate(id, {nombre, precio, cantidad, stock, marca}, (error, ferreteria)=>{
        if(error){
            return res.status(500).json({
                message: 'Error al actualizar la herramienta'
            })
        }
        res.redirect('/')
    })
}

//Borrar
module.exports.borrar = (req, res)=>{
    const id = req.params.id
    Ferreteria.findByIdAndRemove(id, (error, ferreteria)=>{
        if(error){
            return res.status(500).json({
                message: 'Error al eliminar la herramienta'
            })
        }
        res.redirect('/')
    })
}