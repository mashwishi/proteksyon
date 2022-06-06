<?php
    session_start();
    $admin_user_uuid = $_SESSION['admin_user_uuid'];

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    //Health Center
    if($admin_user_uuid == '0x926a09cc9dec481113888511b69c60f5'){
        include './modify_user.php';
    }
    //Barangay
    if($admin_user_uuid == '0x833a5adfaa7b527480b2e02db7333e8d'){
        include './modify_establishment.php';
    }

?>