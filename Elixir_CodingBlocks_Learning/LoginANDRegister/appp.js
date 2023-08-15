var express = require('express');
var routes = require('./routes');
var user = require('./routes/user');
var http = require('http');
var path = require('path');
//var methodOverride = require('method-override');
var app = express();
var mysql      = require('mysql');
var bodyParser=require("body-parser");


var session = require('express-session');
app.use(session({
    secret: 'keyboard cat',
    resave: false,
    saveUninitialized: true,
    cookie: { maxAge: 60000 }
}));



var sess = req.session;  //initialize session variable
req.session.userId = results[0].id; //set user id
req.session.user = results[0];//set user name



req.session.destroy(function(err) {
    //cal back method
});


var message = '';
message = 'Wrong Credentials.';
res.render('index.ejs',{message: message});







var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : 'Vicky@123',
    database : 'test'
});

connection.connect();

global.db = connection;

// all environments
app.set('port', process.env.PORT || 8080);
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));
app.post('/login', user.login);//call for login post
app.post('/signup', user.signup);//call for signup post



app.get('/', routes.index);//call for main index page
app.get('/login', routes.index);//call for login page
app.get('/sig', user.sig);//call for signup page

//Middleware
app.listen(8080);