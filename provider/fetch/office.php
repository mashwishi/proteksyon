<?php
    session_start();

    $provider_id = $_SESSION['provider_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    
    $current_status_sql = "SELECT * FROM status_tb where status_id = '$provider_id'";
    $current_status = mysqli_query($connect, $current_status_sql);

    $query = "SELECT * FROM provider_tb WHERE provider_id = '$provider_id'";
    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                while($status_sql = mysqli_fetch_array($current_status))
                {
                    if($status_sql["status_info"] === 'Open'){
                        $output .= '
                        '. $row['provider_name'] .'
                        <script src="./assets/js/office_status.js"></script>
                        <label class="switch">
                        <input id="switch-mode" hidden type="checkbox" onchange="updateStatus()" checked>
                        <span for="switch-mode" class="slider-switch round-switch"></span>
                        </label>
                        ';  
                        echo $output;
                        // Close DB Connection
                        $connect -> close();   
                    }else{
                        $output .= '
                        '. $row['provider_name'] .'
                        <script src="./assets/js/office_status.js"></script>
                        <label class="switch">
                        <input id="switch-mode" hidden type="checkbox" onchange="updateStatus()">
                        <span for="switch-mode" class="slider-switch round-switch"></span>
                        </label>
                        ';  
                        echo $output;
                        // Close DB Connection
                        $connect -> close();   
                    }
                }                
            }                               
        }
        else{
            echo '~';           
            // Close DB Connection
            $connect -> close();  
        }
?>