<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon");

    $report_statusx = $_POST['report_status'];
    $report_idx = $_POST['report_id'];

    if(isset($_POST["approveReport"]))
    {
 
        if(isset($_POST['rAgreeUpdate'])){

            $status = $_POST['status'];
            $report_id = $_POST['report_id'];
            $user_id = $_POST['user_id'];

            if(
                $status != null || $status != '' ||
                $report_id != null || $report_id != '' ||
                $user_id != null || $user_id != ''
            ){

                if($status == 'Positive to Covid'){

                    $sql = "
                    UPDATE 
                        users_tb, user_reports
                    SET 
                        users_tb.user_verification=3,
                        user_reports.report_status=1
                    WHERE
                        users_tb.user_id = $user_id
                    AND 
                        user_reports.report_id = $report_id";
                    if (mysqli_query($conn, $sql)) {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=0');
                        }
                    else {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=3');
                    }

                }
                elseif($status == 'Explosed to Covid'){

                    $sql = "
                    UPDATE 
                        users_tb, user_reports
                    SET 
                        users_tb.user_verification=2,
                        user_reports.report_status=1
                    WHERE
                        users_tb.user_id = $user_id
                    AND 
                        user_reports.report_id = $report_id";
                    if (mysqli_query($conn, $sql)) {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=0');
                        }
                    else {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=3');
                    }

                }
                elseif($status == 'Sharing QR Code'){

                    $sql = "
                    UPDATE 
                        users_tb, user_reports
                    SET 
                        users_tb.user_status=2,
                        user_reports.report_status=1
                    WHERE
                        users_tb.user_id = $user_id
                    AND 
                        user_reports.report_id = $report_id";
                    if (mysqli_query($conn, $sql)) {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=0');
                        }
                    else {
                        header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=3');
                    }

                }
                    // Close DB Connection
                    $conn -> close();  
            }else{
                header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=2');
            }

        }else{
            header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=1');
        }
    }

    if(isset($_POST["denyReport"]))
    {
 
        if(isset($_POST['rAgreeUpdate'])){

            $request_id = $_POST['request_id'];
            
            if(
            $request_id != null || $request_id != '' 
            ){

                $sql = "DELETE FROM request_tb 
                WHERE request_id = '$request_id'";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: /admin/reports/');
                    }
                else {
                    header('Location: /admin/reports/requestData?ReportID='.$report_idx.'&alertInformation=3');
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header('Location: /admin/requests/requestData?RequestID='.$report_idx.'&alertInformation=2');
            }

        }else{
            header('Location: /admin/requests/requestData?RequestID='.$report_idx.'&alertInformation=1');
        }
    }
?>  