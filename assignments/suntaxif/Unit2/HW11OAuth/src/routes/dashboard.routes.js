const { Router } = require("express");
const {isAuthorized} = require('../utils/auth');
const router = Router();

router.get('/', isAuthorized ,(req, res) => {
    res.render('dashboard',{
        guilds: req.user.guilds,
    });
    //console.log(req.user.guilds)
});

router.get('/settings', (req, res) => {
    res.send("Settings");
});
  
module.exports = router;