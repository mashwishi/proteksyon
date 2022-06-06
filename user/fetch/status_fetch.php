<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    include '../../mysqli_conn.php';
    $output = '';
    $query = "SELECT * FROM establishment_tb";
    $result = mysqli_query($connect, $query);

    $expo = '';
    $xquery = "
        SELECT user_reports.report_id,
        count(*) AS total,
        sum(case when user_reports.report_status = 1 AND user_reports.status = 'Exposed to Covid' then 1 else 0 end) AS user_exposed,
        sum(case when user_reports.report_status = 1 AND user_reports.status = 'Positive to Covid' then 1 else 0 end) AS user_positive
        FROM user_reports;";
    $xresult = mysqli_query($connect, $xquery);

    $user_expo = '';
    $yquery = "
    SELECT user_reports.report_id,
    count(*) AS total,
    sum(case when user_reports.report_status = 1 AND user_reports.status = 'Exposed to Covid' AND user_reports.user_id = $user_id then 1 else 0 end) AS user_exposed,
    sum(case when user_reports.report_status = 1 AND user_reports.status = 'Positive to Covid' AND user_reports.user_id = $user_id then 1 else 0 end) AS user_positive
    FROM user_reports;";
    $yresult = mysqli_query($connect, $yquery);

    if(mysqli_num_rows($yresult) > 0){
        $output .= '';
        while($yrow = mysqli_fetch_array($yresult))
        {
                if($yrow['user_exposed'] >=  1){
                    $output .= '
                        <div class="container">         
                            <div class="row">
                                <div class="alert alert-danger" role="alert">
                                    <h5>
                                        Oh no! You are <b>'. $yrow['user_exposed'] .'</b> time(s) exposed to covid, Please contact nearest hospital to get assistant.
                                    </h5>
                                </div> 
                            </div>            
                        </div> 
                    ';
                }
                else{
                    $output .= '';
                }     
                if($yrow['user_positive'] >=  1){
                    $output .= '
                        <div class="container">         
                            <div class="row">
                                <div class="alert alert-danger" role="alert">
                                    <h5>
                                        Oh no! You are positive covid, Call our barangay hotline at +046-432-0454 to get emergency assistant.
                                    </h5>
                                </div> 
                            </div>            
                        </div> 
                    ';
                }
                else{
                    $output .= '';
                }               
            }            
    }
    else{
    }

    if(mysqli_num_rows($xresult) > 0){
        $output .= '';
        while($xrow = mysqli_fetch_array($xresult))
        {
                $total_covid = $xrow['user_exposed'] + $xrow['user_positive'];
                if($total_covid >=  1){
                    $output .= '
                        <div class="container">         
                            <div class="row">
                                <div class="alert alert-warning" role="alert">
                                    <h5>
                                        Warning! There is currently <b>'. $total_covid .'</b> exposed/positive to covid in our barangay. Stay home to avoid contact with other people. 
                                        Keep safe and wash your hands always everyone!
                                    </h5>
                                </div> 
                            </div>            
                        </div> 
                    ';
                }
                else{
                    $output .= '';
                }                    
            }            
    }
    else{
    }

    //status log
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    if($row['establishment_status'] == 'Open'){
                        $output .= '
                        <div class="container">         
                            <div class="row">
                                <ul id="status-ul-list">
                                    <li id="status-list" style="background-image: linear-gradient(90deg,#11994e 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                        <h3>'. $row['establishment_name'] .'</h3>
                                        '. $row['establishment_time'] .'<br/>
                                        <div class="status-right status-top text-success">
                                        '. $row['establishment_status'] .'
                                        </div>
                                    </li>
                                </ul>
                            </div>            
                        </div> 
                        ';
                    }
                    else{
                        $output .= '
                        <div class="container">         
                                <div class="row">
                                <ul id="status-ul-list">
                                        <li id="status-list" style="background-image: linear-gradient(90deg,#fc3838 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                            <h3>'. $row['establishment_name'] .'</h3>
                                            '. $row['establishment_time'] .'<br/>
                                            <div class="status-right status-top text-danger">
                                            '. $row['establishment_status'] .'
                                            </div>
                                        </li>
                                    </ul>
                            </div>            
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
            <div class="container">
                <div class="card-body">                
                    <div class="row">
                            <div class="col">                                            
                                    <div style="font-size: 30px; color: #24D080; float: right;">
                                    <i class="fas fa-exclamation-square"></i>
                                    </div>                   
                                    <div class="d-flex align-items-center">                                  
                                        <div>
                                        <span class="h3 d-block mb-0">Failed to load</span>
                                        </div>
                                            <div class="d-flex align-items-center ms-3 mt-n1">
                                            <span class="badge badge-xs badge-pill bg-soft-success text-success">
                                                404
                                            </span>
                                            </div>
                                    </div>
                                    <span class="d-block text-sm text-muted">
                                    Please try again.
                                    </span>
                            </div>
                    </div>
                </div>            
            </div>     
            ';
            // Close DB Connection
            $connect -> close();  
        }


?>