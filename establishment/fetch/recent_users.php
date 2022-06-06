<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $query = "
    SELECT 
    logs_tb.logs_id, logs_tb.time_in, logs_tb.status, logs_tb.establishment_id, users_tb.user_first_name, users_tb.user_last_name, users_tb.user_contactno, users_tb.user_city, users_tb.user_avatar, users_tb.user_uuid
    FROM logs_tb, users_tb
    WHERE logs_tb.establishment_id = $establishment_id AND logs_tb.user_id = users_tb.user_id
    ORDER BY logs_tb.logs_id DESC;
    ";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <tr>
                        <td>
                            <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'">
                            <p>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .'</p>
                            </td>
                            <td>'. $row['time_in'] .'</td>
                            <td><a class="status completed" style="border: none; outline: none;" href="/establishment/reportUser?userUUID='. $row['user_uuid'] .'">Appeal</a></td>
                    </tr>
                    ';                  
            }            
            echo $output;
            // Close DB Connection
            $connect -> close();                     
        }
        else{
            echo '
            <tr>
                <td colspan="3">No Recent Time in</td>
            </tr>
            ';           
            // Close DB Connection
            $connect -> close();  
        }
?>