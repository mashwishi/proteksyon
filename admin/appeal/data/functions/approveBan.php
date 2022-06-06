<?php
    if(isset($_POST["approveBan"]))
    {
        if(isset($_POST['rAgreeUpdate'])){
            $status = $_POST['status'];
            $report_id = $_POST['report_id'];
            $user_id = $_POST['user_id'];
            $sql = "
            UPDATE users_tb, user_reports 
            SET users_tb.user_status= 2 , user_reports.report_status= 4
            WHERE users_tb.user_id = $user_id
            AND user_reports.report_id = $report_id";
            if (mysqli_query($conn, $sql)) {
                header('Location: /admin/appeal/requestData?ReportID='.$report_idx);
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