<?php

/* 
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/core/
 * NAME: core.php
 */

session_start();
try{
    $db = new PDO("mysql:host=localhost;port=3306;dbname=thirdtypetapes_c", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db->exec('SET sql_mode=""');
}
catch(Exception $e){
    die('Error : '.$e->getMessage());
}

require("core/model.php");

