import express,{Router} from "express";
import {addMedicineIncomplete,getMedicineName,getMedicineCategory,addMedicine, addMedicineLot, getAllMedicines,getMedicine,editMedicineId,editMedicineQuantity, editMedicineName,editMedicineCategory, deleteMedicine,deleteMedicineActualDate,deleteMedicineCategory, deleteMedicineQuantity} from "../controller/medicine-controller.js";
import { addUser } from "../controller/user-controller.js";

const router= express.Router();
//Post methods
router.post('/newMedicine',addMedicine);
router.post('/newBatch',addMedicineLot);//Bussines Uri
router.post('/medicineIncomplete',addMedicineIncomplete);//Bussines Uri
router.post('/newUser',addUser);


router.get('/all',getAllMedicines);
router.get('/:id',getMedicine);//Bussines Uri
router.get('/fname/:name',getMedicineName);
router.get('/fcategory/:category',getMedicineCategory);


//Put methods
router.put('/:id',editMedicineId);
router.put('/pnmedicine/:name',editMedicineName);// Bussines Uri
router.put('/pcmedicine/:category',editMedicineCategory);
router.put('/pqmedicine/:quantity',editMedicineQuantity);

//Delete methods
router.delete('/:id',deleteMedicine);
router.delete('/expDate/:actualDate',deleteMedicineActualDate);
router.delete('/quantity/:quantity',deleteMedicineQuantity);
router.delete('/category/:category',deleteMedicineCategory);


export default router;