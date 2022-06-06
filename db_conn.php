<?php 

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "proteksyon.ml";

#remotemysql.com
#$sName = "remotemysql.com";
#$uName = "C9eA1TETBR";
#$pass = "OdvWFvKWBw";
#$db_name = "C9eA1TETBR";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}