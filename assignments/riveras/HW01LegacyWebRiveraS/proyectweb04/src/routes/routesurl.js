const {Router} = require('express');
const {
    getAllOrders, 
    getOrder, 
    createOrder, 
    deleteOrder, 
    updateOrder,
    getLogin,
    getAllDrinks
} = require('../controlers/controler');

const router = Router();

router.get('/orders', getAllOrders)

router.get('/orders/:id', getOrder)

router.post('/orders', createOrder)

router.delete('/orders/:id', deleteOrder)

router.put('/orders/:id', updateOrder)

//////////////

router.get('/login/:id', getLogin);

router.get('/drinks', getAllDrinks);

module.exports = router;