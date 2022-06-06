<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $report_statusx = $_POST['report_status'];
    $report_idx = $_POST['report_id'];

    #Decline Any Appeal
    include './functions/deleteAppeal.php';

    #Ban and Unban
    include './functions/approveUnban.php';
    include './functions/approveBan.php';

    #Person Under Investigation
    include './functions/startQuarantine.php';
    include './functions/applyFine.php'; 
    include './functions/applyPositive.php'; 

    #Exposed to Covid
    include './functions/applyPUI.php';

    #Positive to Covid
    include './functions/applyRecovered.php';
    include './functions/startQuarantinePositive.php';

?>  