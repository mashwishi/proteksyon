<?php
    session_start();

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "
    SELECT *
    FROM users_tb
    ORDER BY user_id DESC
    LIMIT 5;
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
                            <td>'. $row['user_email'] .'</td>
                            <td><a class="status completed" style="border: none; outline: none;" href="/admin/approveUser?userUUID='. $row['user_uuid'] .'">Approve</a></td>
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