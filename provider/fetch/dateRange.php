<?php 
    session_start();

    $provider_id = $_SESSION['provider_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");

if(isset($_POST["from_date"], $_POST["to_date"])) {
    $userData = "";

    $query = "
    SELECT logs_tb.logs_id, logs_tb.time_in, logs_tb.status, logs_tb.provider_id, users_tb.user_first_name, users_tb.user_last_name, users_tb.user_contactno, users_tb.user_city, users_tb.user_avatar, users_tb.user_email, users_tb.user_contactno, users_tb.user_uuid 
    FROM users_tb
    INNER JOIN logs_tb
    ON users_tb.user_id = logs_tb.user_id
    WHERE (logs_tb.log_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."') AND logs_tb.provider_id = '".$provider_id."'
    ORDER BY logs_tb.log_date desc";

    $result = mysqli_query($connect, $query);

    $userData .='';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))  
        {
            $userData .='
            <tr>
                <td>
                    <img src="../../user/user_data/user_avatar/'.$row["user_avatar"].'">
                    <p>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .'</p>
                </td>
                <td>
                    '. $row['user_email'] .'
                </td>
                <td>
                    +'. $row['user_contactno'] .'
                </td>         
                <td>
                    '. $row['user_city'] .'
                </td>                                       
                <td>
                    '. $row['time_in'] .'
                </td>
                <td>
                    <a class="status completed" style="border: none; outline: none;" href="/provider/reportUser?userUUID='. $row['user_uuid'] .'">Report</a>
                </td>
            </tr>
        ';    
        }
    }
    else  
    {  
        $userData .= '  
        <tr>
        <td colspan="6"><center>No Activities Found.</Center></td>
        </tr>';  
    }  
    echo $userData;  
}
?>