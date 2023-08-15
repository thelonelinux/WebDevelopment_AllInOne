<?php
/**
 * Created by PhpStorm.
 * User: dell 6520
 * Date: 4/18/2018
 * Time: 2:34 PM
 */
session_start();


function getusername(){

    if(isset($_SESSION["username"])){

        $output=$_SESSION["username"];
        return $output;



    }

}


function logout(){

    session_unset();

// destroy the session
    session_destroy();

}