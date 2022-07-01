const express = require("express");
const path = require("path");
const session = require("express-session");
const passport = require("passport");

require('./strategies/discordStrategy');

const app = express();

//settings
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

//Middlewares
app.use(session({
    secret: 'some secret',
    saveUninitialized: false,
    resave: false
}));
app.use(passport.initialize());
app.use(passport.session());

//Global variable
app.use((req, res, next) =>{
    //console.log(req.user);
    app.locals = req.user;
    next();
});

module.exports = app;

//routes
app.use('/', require('./routes/index.routes'));

app.use('/auth', require('./routes/auth.routes'));

app.use('/dashboard', require('./routes/dashboard.routes'));


