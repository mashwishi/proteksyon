<?php 

#$sName = "localhost";
#$uName = "root";
#$pass = "";
#$db_name = "proteksyon";

$sName = "sql205.epizy.com";
$uName = "epiz_30455431";
$pass = "oCOCp63FyZxNv";
$db_name = "epiz_30455431_proteksyon";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo $e->getMessage();
}