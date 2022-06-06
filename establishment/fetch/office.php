<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    include '../../mysqli_conn.php';
    $output = '';

    
    $current_status_sql = "SELECT * FROM establishment_tb where establishment_id = '$establishment_id'";
    $current_status = mysqli_query($connect, $current_status_sql);

    $query = "SELECT * FROM establishment_tb WHERE establishment_id = '$establishment_id'";
    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                while($status_sql = mysqli_fetch_array($current_status))
                {
                    if($status_sql["establishment_status"] === 'Open'){
                        $output .= '
                        '. $row['establishment_name'] .'
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
                        '. $row['establishment_name'] .'
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