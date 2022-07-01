const { DISCORD_CLIENT_ID, DISCORD_CLIENT_SECRET } = require('../config');

const passport = require('passport');
const { Strategy } = require('passport-discord');

passport.serializeUser((user, done) => {
    done(null, user)
});

passport.deserializeUser((user, done) => {
    done(null, user)
});

passport.use(new Strategy({
    clientID: DISCORD_CLIENT_ID,
    clientSecret: DISCORD_CLIENT_SECRET,
    callbackURL: '/auth/redirect',
    scope: ['identify', 'guilds']
}, (accesToken, refreshToken, profile, done) => {
    try {
        //console.log(profile);
        done(null, profile);
    } catch (error) {
        console.error(error);
        return done(error, null)
    }

}));