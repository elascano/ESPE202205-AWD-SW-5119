import express,{Router} from "express";
import { getbike} from "../controller/bike-controller.js";
import { addUser } from "../controller/user-controller.js";

const router= express.Router();


router.get('/bike/:bikeId',getbike);

export default router;