<?php
    if(isset($_POST["deleteAppeal"]))
    {
        if(isset($_POST['rAgreeUpdate'])){
            $status = $_POST['status'];
            $report_id = $_POST['report_id'];
            $user_id = $_POST['user_id'];
            $sql = "
            DELETE FROM user_reports
            WHERE user_reports.user_id = $user_id
            AND user_reports.report_id = $report_id";
            if (mysqli_query($conn, $sql)) {
                header('Location: /admin/appeal/');
            }
            else {
                header('Location: /admin/appeal/requestData?ReportID='.$report_idx.'&alertInformation=3');
            }
                $conn -> close();  
        }else{
            header('Location: /admin/appeal/requestData?ReportID='.$report_idx.'&alertInformation=1');
        }
    }
?>