

mongoose=require('mongoose');
url = "mongodb://localhost/ListOfStudents"

mongoose.connect(url,{
    useNewUrlParser: true,
    useUnifiedTopology:true,
})
.then(()=> console.log("Conection to the database successfully") )
.catch((e)=>console.log("error->"+e))

const personSchema= mongoose.Schema({
    name:String,
    age:Number,
    phone: String,
    email: String,
    dni: String,
},{versionKey:false})

const personModel= mongoose.model("students",personSchema)
    

const view = async () => {
    const person = await personModel.find()
    console.log(person)
}

 const create= async () =>{
    
    const person = new personModel({
    
    name:"Andres",
    age:20,
    phone: "0999585135",
    email: "agvalarezo1@espe.edu.ec",
    dni: "1722904701",
    })
    const result= await person.save()
    console.log(result)
    
}
const update= async (id) =>{
    const person = await personModel.updateOne({_id:id},{
        $set:{
            name:"Adalberto",
            age:20,
            phone: "0999490926",
            email: "adalberto@espe.edu.ec",
            dni: "173456789",
        }
    })
}
const deleteStudent= async(id) =>{
    const person = await personModel.deleteOne({_id:id})
    console.log(person)
}


//deletePerson('627fb3bb0f4d56326224801e')
create()
//view()
//update('627fb3bb0f4d56326224801e')