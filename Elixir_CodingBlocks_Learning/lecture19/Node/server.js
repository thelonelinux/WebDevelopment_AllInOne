const express = require('express');
const app=express();
const bodyParser= require('body-parser');
const passport=require('passport');
const passportLocal=require('passport-local').Strategy;
const session=require('express-session');
const cookieParser=require('cookie-parser');
const userconfig=require('./userconfig');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
app.use(cookieParser());
app.use(session({secret:'dog is here'}));
app.use(passport.initialize());
app.use(passport.session());

app.post('/login',passport.authenticate('local',
    {
        successRedirect:'/success',
        failureRedirect:'/failure'
    }

    )
);

passport.use(new passportLocal(
    function (username,password,done) {
        // console.log(username);
        // console.log(password);
        // return done(null,username);
        if(username!=userconfig.username){
            return done(null,false,{message : 'username is incorrect'});
        }
        else if(password!=userconfig.password){
            return done(null,false,{message: 'password is incorrect'});
        }
        else{
            return done(null,userconfig.id);
        }
    }


    ));

passport.serializeUser(function (id,done) {
    return done(null,id);
});

passport.deserializeUser(function (user,done) {
    return done(null,user);
});

app.get('/success',function (req,res) {
    console.log("success");
    res.sendStatus(200);
})

app.get('/failure',function (req,res) {
    console.log("failure");
    res.sendStatus(200);
})

app.listen(5000,function () {
    console.log("server is running on 5000");
});
