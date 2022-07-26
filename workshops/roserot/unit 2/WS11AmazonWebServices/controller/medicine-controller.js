import User from '../userSchema/userSchema.js';
import Medicine from '../userSchema/medicineSchema.js';


export const addMedicine = async (request, response) => {
    const medicine = request.body;
    const newMedicine = new Medicine(medicine);

    try {
        await newMedicine.save();
        response.status(201).json(newMedicine);
    } catch (error) {
        response.status(409).json({ message: error.message });
    }

};

export const addMedicineLot = async (request, response) => {
    const medicine = request.body;
    medicine.description = medicine.description + " Lote Nuevo";
    const newMedicine = new Medicine(medicine);

    try {
        await newMedicine.save();
        response.status(201).json(newMedicine);
    } catch (error) {
        response.status(409).json({ message: error.message });
    }

};
export const addMedicineIncomplete = async (request, response) => {
    const medicine = request.body;
    const medicines = await Medicine.find({});
    var idAux = 0;

    for (let i = 0; i < medicines.length - 1; i++) {
        const i1 = i + 1;
        if (medicines[i].id >= medicines[i1].id) {
            idAux = medicines[i].id;
        }

    }

    if (medicine.id === '') {
        medicine.id = idAux + 1;
    }
    if (medicine.name == '') {
        medicine.name = "Nombre Vacio";
    }
    if (medicine.description === "") {
        medicine.description = "Descripción vacia";
    }
    if (medicine.category === "") {
        medicine.category = "Categoria vacia";
    }
    if (medicine.quantity === '') {
        medicine.quantity = 0;
    }
    if (medicine.price === "") {
        medicine.price = "Precio vacio";
    }
    if (medicine.elabDate === "") {
        medicine.elabDate = "Fecha de elaboracion vacia";
    }
    if (medicine.expDate === "") {
        medicine.expDate = "Fecha de expiracion vacia";
    }

    const newMedicine = new Medicine(medicine);

    try {
        await newMedicine.save();
        response.status(201).json(newMedicine);
    } catch (error) {
        response.status(409).json({ message: error.message });
    }

};

export const getAllMedicines = async (request, response) => {
    try {

        const medicines = await Medicine.find({});
        response.status(200).json(medicines);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

export const getMedicine = async (request, response) => {
    try {

        const medicine = await Medicine.findOne({ id: request.params.id });
        response.status(200).json(medicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

export const getMedicineName = async (request, response) => {
    try {

        const medicine = await Medicine.findOne({ name: request.params.name });
        response.status(200).json(medicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};
export const getMedicineCategory = async (request, response) => {
    try {

        const medicine = await Medicine.findOne({ category: request.params.category });
        response.status(200).json(medicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

export const editMedicineId = async (request, response) => {
    const medicine = request.body;
    medicine.id= request.params.id;
    const editedMedicine = new Medicine(medicine);
    try {
        await Medicine.updateOne({ id: request.params.id }, {$set:{editedMedicine}});
        response.status(200).json(editedMedicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }
};
export const editMedicineName = async (request, response) => {
    const medicine = request.body;
    const medicines = await Medicine.find({});
    var idAux = 0;
    var idAux1= 0;

    for (let i = 0; i < medicines.length - 1; i++) {
        const i1 = i + 1;
        if (medicines[i].id >= medicines[i1].id) {
            idAux1 = medicines[i].id;
        }

    }

    for (let i = 0; i < medicines.length - 1; i++) {
        const i1 = i + 1;
        if (medicines[i].id == request.body.id) {
            idAux = idAux+1;
        }
        if(idAux== 2){
            medicine.id= idAux1+1;
        }

    }
    medicine.name= request.params.name;
    const editedMedicine = new Medicine(medicine);
    try {
        await Medicine.updateOne({ name: request.params.name }, {$set:{editedMedicine}});
        response.status(200).json(editedMedicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }
};
export const editMedicineCategory = async (request, response) => {
    const medicine = request.body;
    medicine.category= request.params.category;
    const editedMedicine = new Medicine(medicine);
    try {
        await Medicine.updateOne({ category: request.params.category }, {$set:{editedMedicine}});
        response.status(200).json(editedMedicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }
};

export const editMedicineQuantity = async (request, response) => {
    const medicine = request.body;
    medicine.quantity= request.params.quantity;
    const editedMedicine = new Medicine(medicine);
    try {
        await Medicine.updateOne({ quantity: request.params.quantity }, {$set:{editedMedicine}});
        response.status(200).json(editedMedicine);
    } catch (error) {
        response.status(404).json({ message: error.message });
    }
};

export const deleteMedicine = async (request, response) => {
    try {
        await Medicine.deleteOne({ id: request.params.id });
        response.status(200).json({ message: 'Deleted successfully' });
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};
export const deleteMedicineActualDate = async (request, response) => {

    try {
        await Medicine.deleteOne({ expDate: request.params.actualDate.toString() });
        response.status(200).json({ message: 'Deleted successfully' });
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

export const deleteMedicineQuantity = async (request, response) => {

    try {
        await Medicine.deleteOne({ quantity: request.params.quantity });
        response.status(200).json({ message: 'Deleted successfully' });
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

export const deleteMedicineCategory = async (request, response) => {

    try {
        await Medicine.deleteOne({ category: request.params.category });
        response.status(200).json({ message: 'Deleted successfully' });
    } catch (error) {
        response.status(404).json({ message: error.message });
    }

};

