const express=require("express");
var app=express();

var router=express.Router();


router.use(function (req,res,next) {
    console.log("/"+req.method);
    next();
});

router.get("/",function (req,res) {
    res.sendFile(__dirname + "/aboutme.html");
});

app.use("/",router);

app.listen(3000,function () {
    console.log("port 3000");
});