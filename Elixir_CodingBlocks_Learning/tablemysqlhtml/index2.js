const http = require('http');
const mysql = require('mysql');

const pool = mysql.createPool({
    host: 'localhost',
    user: 'root',
    password: 'Vicky@123',
    database: 'mydb',
    charset: 'utf8'
});

//html string that will be send to browser
var reo ='<html><head><title>Node.js MySQL Select</title></head><body><h1>Result</h1>{${table}}</body></html>';

//sets and returns html table with results from sql select
//Receives sql query and callback function to return the table
function setResHtml(sql, cb){
    pool.getConnection(function(err, con){
        if(err) throw err;

        con.query(sql, function(err, res, cols){
            if(err) throw err;

            var table =''; //to store html table

            //create html table with data from res.
            for(var i=0; i<res.length; i++){
                table +='<tr><td>'+ (i+1) +'</td><td>'+ res[i].name +'</td><td>'+ res[i].address +'</td></tr>';
            }
            table ='<table border="1"><tr><th>Nr.</th><th>Name</th><th>Address</th></tr>'+ table +'</table>';

            con.release(); //Done with mysql connection

            return cb(table);
        });
    });
}

let sql ='SELECT name, address FROM customers ';

//create the server for browser access
const server = http.createServer(function(req, res){
    setResHtml(sql, function(resql){
        reo = reo.replace('{${table}}', resql);
        res.writeHead(200, {'Content-Type':'text/html; charset=utf-8'});
        res.write(reo, 'utf-8');
        res.end();
    });
});

server.listen(8080, function(){
    console.log('Server running at //localhost:8080/');
});