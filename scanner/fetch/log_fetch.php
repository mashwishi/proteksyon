<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    include '../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT 
    logs_tb.logs_id, logs_tb.time_in, logs_tb.status, logs_tb.establishment_id, users_tb.user_first_name, users_tb.user_last_name, users_tb.user_contactno, users_tb.user_city
    FROM logs_tb, users_tb
    WHERE logs_tb.establishment_id = $establishment_id AND logs_tb.user_id = users_tb.user_id
    ORDER BY logs_tb.logs_id DESC;
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
                                    <h3>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .'</h3>
                                    <div class="status-right status-top">
                                        <i class="far fa-calendar"></i> Time in: '. $row['time_in'] .'
                                    </div>                                        
                                    <i class="fas fa-phone"></i> +'. $row['user_contactno'] .' <b>|</b>  <i class="fa fa-map-marker" aria-hidden="true"></i> '. $row['user_city'] .'
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
                                        <h3>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .'</h3>
                                        <div class="status-right status-top">
                                            <i class="far fa-calendar"></i> Time in: '. $row['time_in'] .' <b>|</b> <i class="far fa-comment-alt"></i> '. $row['status'] .'
                                        </div>                                        
                                        <i class="fas fa-phone"></i> +'. $row['user_contactno'] .' <b>|</b>  <i class="fa fa-map-marker" aria-hidden="true"></i> '. $row['user_city'] .'
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
                                There is currenly no acitivity here yet.<br/>
                                <div class="status-right status-top text-info">
                                Scan users to add data
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