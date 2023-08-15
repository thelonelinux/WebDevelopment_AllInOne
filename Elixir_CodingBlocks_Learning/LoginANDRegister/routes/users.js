// var express = require('express');
// var router = express.Router();
//
// /* GET users listing. */
// router.get('/', function(req, res, next) {
//   res.send('respond with a resource');
// });
//
// module.exports = router;


exports.sig= function(req, res){
    message = '';
    if(req.method == "POST"){
        //post data

    } else {
        res.render('sig');
    }
};