<?php
session_start();

$ReportID = isset($_POST["ReportID"]) ? $_POST["ReportID"] : '';

include '../../../mysqli_conn.php';

$output = '';

$query = "
    SELECT 
        user_reports.report_id, 
        user_reports.report_status,
        user_reports.status, 
        user_reports.message,
        user_reports.attachment,
        user_reports.exported,
        user_reports.date,
        user_reports.timestamp,
        users_tb.user_id,
        users_tb.user_first_name,
        users_tb.user_last_name,
        users_tb.user_email,
        users_tb.user_contactno,
        users_tb.user_vaccine,
        users_tb.user_dose,
        establishment_tb.establishment_name,
        establishment_tb.establishment_email,
        establishment_tb.establishment_contactno
    FROM
        users_tb,  user_reports, establishment_tb
    WHERE
        user_reports.user_id = users_tb.user_id
    AND
        user_reports.establishment_id = establishment_tb.establishment_id 
    AND 
        user_reports.report_id = '$ReportID'";

$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0)
{

    $output .= '';
    while ($row = mysqli_fetch_array($result))
    {

        //QR
        include './getInfo/sharingqr.php';

        //Person Under Investigation
        include './getInfo/pui.php'; 

        //Exposed to Covid
        include './getInfo/exposed.php'; 

        //Positive to Covid
        include './getInfo/positive.php'; 

        //None - Display Nothing
        //else{$output .= '';}

    }
    echo $output;
    // Close DB Connection
    $connect->close();
}
else
{
    echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to get your informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
    // Close DB Connection
    $connect->close();
}
?>
