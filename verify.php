<?php
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'].'/api/lib/Signup.class.php';
require_once($_SERVER['DOCUMENT_ROOT']."/api/lib/Database.class.php");

$token = mysqli_real_escape_string(Database::getConnection(), $_GET['token']);
try{
    if(Signup::verifyAccount($token)){
        ?>
        <h1 style="color: green">Verified</h1>
        <?php
    } else {
        ?>
        <h1 style="color: red">Cannot Verify</h1>
        <?php
    }
}
catch(Exception $e){
    ?>
    <h1 style="color: orange"><?=$e->getMessage()?></h1>
    <?php
}

