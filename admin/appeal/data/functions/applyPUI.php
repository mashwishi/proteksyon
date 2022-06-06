<?php 
    if(isset($_POST["applyPUI"]))
    {
        if(isset($_POST['rAgreeUpdate'])){

            $status = $_POST['status'];
            $report_id = $_POST['report_id'];
            $user_id = $_POST['user_id'];

            date_default_timezone_set('Asia/Manila');
            $date_today = date('F j, Y g:i:A ');
            $timestamp = date('Y-m-d H:i:s', time());

            $sql = "
            UPDATE user_reports, users_tb
            SET
            user_reports.status = 1,
            user_reports.report_status = 1,
            user_reports.date = '$date_today',
            user_reports.timestamp = current_timestamp
            WHERE users_tb.user_id = $user_id
            AND user_reports.report_id = $report_id";

            if (mysqli_query($conn, $sql)) {
                header('Location: /admin/appeal/requestData?ReportID='.$report_idx.'&alertInformation=0');
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