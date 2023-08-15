const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const passport = require('passport');
const passportLocal = require('passport-local').Strategy;
const session = require('express-session');
const cookieParser = require('cookie-parser');
const userconfig = require('./userconfig.json')
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
app.use(cookieParser());
app.use(session({secret: 'dog is here'}));
app.use(passport.initialize());
app.use(passport.session());


        app.post('/login', passport.authenticate('local',
                 {
                 	successRedirect: '/success',
         	failureRedirect: '/failure'
     }

    	)
);

    passport.use(new passportLocal(
                function (username, password, done) {

                            if (username !== userconfig.username) {
                            	return done(null, false, {message: 'Username is incorrect'})
                                }
                        else if (password !== userconfig.password) {
                            	return done(null, false, {message: 'Password is incorrect'})
                                }
                    	return done(null, userconfig.id);
                    }
        	));

passport.serializeUser(function(id, done) {
       return  done(null, id);
    });

    passport.deserializeUser(function(id, done) {
        	if(userconfig.id === id) {
            		return  done(null, userconfig.username);
            	}

            });

    app.get('/success', function(req, res){

               console.log(req.user);
           res.sendStatus(200);
        });

app.get('/failure', function(req,res){
       res.send('failureRedirect');
    });

app.listen(5000, function(){
    	console.log("Server is running")
    });