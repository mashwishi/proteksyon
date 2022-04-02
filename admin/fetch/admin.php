<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';


    $query = "SELECT * FROM users_tb WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                $output .= $row['user_last_name'] . ', ' . $row['user_first_name'];  
                echo $output;
                // Close DB Connection
                $connect -> close();               
            }                               
        }
        else{
            echo '~';           
            // Close DB Connection
            $connect -> close();  
        }
?>