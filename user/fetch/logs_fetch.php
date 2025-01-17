<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    include '../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT  logs_tb.logs_id, logs_tb.time_in, logs_tb.status, users_tb.user_id, establishment_tb.establishment_name, establishment_tb.establishment_contactno, establishment_tb.establishment_longitude, establishment_tb.establishment_latitude
    FROM establishment_tb, users_tb, logs_tb
    WHERE establishment_tb.establishment_id = logs_tb.establishment_id and users_tb.user_id = logs_tb.user_id and users_tb.user_id = $user_id
    ORDER BY logs_tb.logs_id DESC
    ";

    $result = mysqli_query($connect, $query);
    

        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    if($row['status'] == ''){
                    $output .= '
                    <div class="container">         
                        <div class="row">
                            <ul id="status-ul-list">
                                <li id="status-list" style="background-image: linear-gradient(90deg,#555555 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                    <h3>'. $row['establishment_name'] .'</h3>
                                    <div class="status-right status-top">
                                        <i class="far fa-calendar"></i> Time in: '. $row['time_in'] .'
                                    </div>                                        
                                    <i class="fas fa-phone"></i> +'. $row['establishment_contactno'] .' <b>|</b> <a href="https://www.google.com/maps/place/'. $row['establishment_latitude'] .','. $row['establishment_longitude'] .'/@'. $row['establishment_latitude'] .','. $row['establishment_longitude'] .',19.75z" target="_blank">Open in Google Map</a>
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
                                    <li id="status-list" style="background-image: linear-gradient(90deg,#EC3434 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                        <h3>'. $row['establishment_name'] .'</h3>
                                        <div class="status-right status-top">
                                            <i class="far fa-calendar"></i> Time in: '. $row['time_in'] .' <b>|</b> <i class="far fa-comment-alt"></i> '. $row['status'] .'
                                        </div>                                        
                                        <i class="fas fa-phone"></i> +'. $row['establishment_contactno'] .' <b>|</b> <a href="https://www.google.com/maps/place/'. $row['establishment_latitude'] .','. $row['establishment_longitude'] .'/@'. $row['establishment_latitude'] .','. $row['establishment_longitude'] .',19.75z" target="_blank">Open in Google Map</a>
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
                <div class="row">
                    <ul id="status-ul-list">
                            <li id="status-list" style="background-image: linear-gradient(90deg,#555555 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                <h3>No Acitivity Logs</h3>
                                You currently have no activity in the barangay yet<br/>
                                <div class="status-right status-top text-info">
                                Try again later
                                </div>
                            </li>
                        </ul>
                </div>            
            </div>    
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>