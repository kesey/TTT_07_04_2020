<?php

/* 
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/core/
 * NAME: core.php
 */

session_start();
try{
    $db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=xmichaut2_thirdtypetapes", "xmichaut2_thirdtypetapes", "J93pZeqOFv", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db->exec('SET sql_mode=""');
}
catch(Exception $e){
    die('Error : '.$e->getMessage());
}

require("core/model.php");

