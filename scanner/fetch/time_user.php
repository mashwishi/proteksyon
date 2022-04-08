<?php
    session_start();
    //include '../../db_conn.php';

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $provider_id = $_SESSION['provider_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "SELECT * FROM users_tb where user_uuid = '$UUID'";
    $result = mysqli_query($connect, $query);
    

        if(mysqli_num_rows($result) > 0){
            $output .= '';                    
            while($row = mysqli_fetch_array($result))
            {            
                
            
            date_default_timezone_set('Asia/Manila');
            $date_today = date('F j, Y g:i:A ');
            $date = date("Y-m-d");
            $user_id_fk = $row["user_id"];

            $sql = "INSERT INTO logs_tb(logs_id,provider_id,user_id,status,time_in, log_date) VALUES('','$provider_id', '$user_id_fk', '', '$date_today', '$date')";
        
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':provider_id' => $provider_id,
                ':user_id' => $user_id_fk,
                ':time_in' => $date_today
            ]);                                       
                
                if (!$connect) {
                    echo '
                        <div class="xcontainer"  id="user_timein_output">
                        <img class="image" src="./assets/img/avatar/0.png" alt="user_avatar">
                        <div> 
                        <h2>Connection Timeout</h2>
                        <h5>There is a connection problem!</h5>
                        <h5>Please try again, Thank you.</h5>
                        </div>                     
                        </div>  
                        <div class="container-approval"> 
                        <button onclick="scanAgain()" class="scan-again-btn">TRY AGAIN</button>
                        </div>                      
                    ';
                    // Close DB Connection
                    $connect -> close();  
                }                   
                else {
                    
                    $output .= '                         
                    <div class="xcontainer" id="user_timein_output">
                        <img class="image" src="../user/user_data/user_avatar/'.$row["user_avatar"].'" alt="user_avatar">
                        <div> 
                            <h2>'. $row["user_first_name"] .' '. $row["user_last_name"] .'</h2>
                            <h5>Time In: '. $date_today .'</h5>
                            <h5>User Successfully Time in!</h5>
                        </div>                     
                    </div>
                    <div class="container-approval"> 
                        <button id="cancel" onclick="scanAgain()" class="cancel-btn btn-danger">CLOSE</button>
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
                    <div class="xcontainer" id="user_timein_output">
                    <img class="image" src="./assets/img/avatar/0.png" alt="user_avatar">
                    <div> 
                        <h2>User not found</h2>
                        <h5>Please try again, make sure that you are</h5>
                        <h5>scanning the qr code of Proteksyon.</h5>
                    </div>                     
                    </div>  
                    <div class="container-approval"> 
                    <button onclick="scanAgain()" class="scan-again-btn">TRY AGAIN</button>
                    </div>                        
            ';
            // Close DB Connection
            $connect -> close();   
        }
?>