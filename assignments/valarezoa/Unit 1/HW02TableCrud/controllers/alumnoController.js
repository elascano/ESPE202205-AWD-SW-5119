const Alumno = require('../model/Alumno')

module.exports.mostrar = (req, res)=>{
    Alumno.find({}, (error, alumnos)=>{
        if(error) {
            return res.status(500).json({
                message: 'Error showing student list'
            })
        }
        return res.render('index', {alumnos: alumnos})
    })
}


module.exports.crear = (req, res)=>{

    const alumno = new Alumno({
        name: req.body.name,
        age: req.body.age,
        phone: req.body.phone,
        email: req.body.email,
        id: req.body.id
    })
    alumno.save(function(error,alumno){
        if(error){
            return res.status(500).json({
                message: 'Error al crear el Alumno'
            })
        }
        res.redirect('/')
    })
}


module.exports.editar = (req,res)=>{
    const id_ = req.body.id_editar
    const name = req.body.nombre_editar
    const age = req.body.edad_editar
    const phone = req.body.phone_editar
    const email = req.body.email_editar
    const id = req.body.id_editar1
    Alumno.findByIdAndUpdate(id_, {name,age,phone,email,id}, (error, alumno)=>{
        if(error){
            return res.status(500).json({
                message: 'error updating student'
            })
        }
        res.redirect('/')
    })
}

module.exports.borrar = (req, res)=>{
    const id = req.params.id
    Alumno.findByIdAndRemove(id, (error, alumno)=>{
        if(error){
            return res.status(500).json({
                message: 'Error deleting the Student'
            })
        }
        res.redirect('/')
    })
}