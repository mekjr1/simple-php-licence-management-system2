<?php
/**
 * Created by PhpStorm.
 * User: mekjr1
 * Date: 2/12/2019
 * Time: 6:32 AM
 */
session_start();
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){

        session_unset();
        header("location:login.php");

}


?>