const express = require('express');
const passport = require('passport');
const session = require('express-session');
const path= require('path');
require('./auth');
const app = express();

app.use(express.static('src'));

app.use(session({ secret: 'cats' }));
app.use(passport.initialize());
app.use(passport.session());
function isLoggedIn(req,res,next){
    req.user ? next(): res.sendStatus(401);
}
app.get('/', function(req, res) {
    res.sendFile(path.join(__dirname, './src/index.html'));
  });

app.get('/auth/google',
    passport.authenticate('google', { scope: ['email', 'profile'] }
    ));
app.get('/google/callback',
  passport.authenticate(
    'google',{
        successRedirect:'/protected',
        failureRedirect:'/auth/failure',
    }
  ));
app.get('/auth/failure',(req,res)=>{
    res.send('something went wrong...');
});
app.get('/protected',isLoggedIn, (req, res) => {
    res.send(`Hello!!  ${req.user.displayName}`);
});
app.get('/logout', (req, res) => {
    req.logout();
    req.session.destroy();
    res.send('Goodbye!!!!!');
  });
app.listen(5000, () => console.log('listening on:5000'));