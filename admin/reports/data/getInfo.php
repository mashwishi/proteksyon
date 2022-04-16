<?php
    session_start();

    $ReportID = isset($_POST["ReportID"]) ? $_POST["ReportID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "
    SELECT 
        user_reports.report_id, 
        user_reports.report_status,
        user_reports.status, 
        user_reports.message,
        user_reports.date,
        users_tb.user_id,
        users_tb.user_first_name,
        users_tb.user_last_name,
        users_tb.user_email,
        users_tb.user_contactno,
        provider_tb.provider_name,
        provider_tb.provider_email,
        provider_tb.provider_contactno
    FROM
        users_tb,  user_reports, provider_tb
    WHERE
        user_reports.user_id = users_tb.user_id
    AND
        user_reports.provider_id = provider_tb.provider_id 
    AND 
        user_reports.report_id = '$ReportID'";
        
    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){

            $output .= '';
            while($row = mysqli_fetch_array($result))
            {

                if($row['report_status'] == 1){
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Notice:</strong> Report has been reviewed, This is a data preview only.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                    
                    <div class="col">

                    <div class="row row-cols-2" style="margin-bottom: 10px;">
                        <div class="col">
                            <h4><strong>Reported:</strong> '. $row['user_first_name'] .' '. $row['user_last_name'] .'</h4>
                            <strong>Reason:</strong> '. $row['status'] .'<br/>
                            <strong>Email:</strong> '. $row['user_email'] .'<br/>
                            <strong>Contact No.:</strong> '. $row['user_contactno'] .'
                        </div>
                        <div class="col">
                            <h4><strong>Reporter:</strong> '. $row['provider_name'] .'</h4>
                            <strong>Date:</strong> '. $row['date'] .'<br/>
                            <strong>Email:</strong> '. $row['provider_email'] .'<br/>
                            <strong>Contact No.:</strong> '. $row['provider_contactno'] .'
                        </div>
                    </div>

                    <div class="col">
                    <strong>Message:</strong>
                    <p>'. $row['message'] .'</p>
                    </div> 

                    </div>
                    ';
                }else{
                    $output .= '
                    <div class="row row-cols-3" style="visibility:hidden;"> 
                        <div class="col">
                        <input type="text" class="form-control" id="report_id" name="report_id" required readonly value="'. $row['report_id'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="report_status" name="report_status" required readonly value="'. $row['report_status'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="status" name="status" required readonly value="'. $row['status'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="user_id" name="user_id" required readonly value="'. $row['user_id'] .'">
                        </div> 
                    </div>


                    <div class="col">

                        <div class="row row-cols-2" style="margin-bottom: 10px;">
                            <div class="col">
                                <h4><strong>Reported:</strong> '. $row['user_first_name'] .' '. $row['user_last_name'] .'</h4>
                                <strong>Reason:</strong> '. $row['status'] .'<br/>
                                <strong>Email:</strong> '. $row['user_email'] .'<br/>
                                <strong>Contact No.:</strong> '. $row['user_contactno'] .'
                            </div>
                            <div class="col">
                                <h4><strong>Reporter:</strong> '. $row['provider_name'] .'</h4>
                                <strong>Date:</strong> '. $row['date'] .'<br/>
                                <strong>Email:</strong> '. $row['provider_email'] .'<br/>
                                <strong>Contact No.:</strong> '. $row['provider_contactno'] .'
                            </div>
                        </div>

                        <div class="col">
                        <strong>Message:</strong>
                        <p>'. $row['message'] .'</p>
                        </div> 


                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" value="0" name="rAgreeUpdate">
                                <label class="form-check-label" for="gridCheck">
                                    Do you agree to this report?
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="approveReport" class="btn btn-success" value="Approve">
                        <input type="submit" name="denyReport" class="btn btn-secondary" value="Decline">
                    </div>
                    '; 
                }

                
                }            
            echo $output;
            // Close DB Connection
            $connect -> close();  
        }
        else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to get your informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>