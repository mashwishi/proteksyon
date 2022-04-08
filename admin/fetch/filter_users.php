<?php
    error_reporting(0);
    session_start();

    $searchinput = $_POST["searchinput"];
    $userstatus = $_POST["userstatus"];

    //Table Page - User List

    // connect to database
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con, 'proteksyon');

    // retrieve selected results from database and display them on page
    if($userstatus != ''  && $searchinput != ''){
        $sql ='
        SELECT users_tb.user_first_name, users_tb.user_middle_name, users_tb.user_last_name, users_tb.user_email, 
        users_tb.user_contactno, users_tb.user_verification, users_tb.user_uuid, users_tb.user_avatar, users_tb.user_status
        FROM users_tb
        WHERE
        user_email LIKE "%'.$searchinput.'%"
        AND user_status = '.$userstatus.''; 
    }
    else if($userstatus != '' && $searchinput == ''){
        $sql ='
        SELECT users_tb.user_first_name, users_tb.user_middle_name, users_tb.user_last_name, users_tb.user_email, 
        users_tb.user_contactno, users_tb.user_verification, users_tb.user_uuid, users_tb.user_avatar, users_tb.user_status
        FROM users_tb
        WHERE user_status = '.$userstatus.''; 
    }
    else if($searchinput != '' && $userstatus == ''){
        $sql ='
        SELECT users_tb.user_first_name, users_tb.user_middle_name, users_tb.user_last_name, users_tb.user_email, 
        users_tb.user_contactno, users_tb.user_verification, users_tb.user_uuid, users_tb.user_avatar, users_tb.user_status
        FROM users_tb
        WHERE user_email LIKE "%'.$searchinput.'%"';  
    }
    else if($userstatus == '' && $searchinput == ''){
        echo "<script> location.href='/admin/users'; </script>";
        exit;
    }
    else{
        echo "<script> location.href='/admin/users'; </script>";
        exit;
    }

    $result = mysqli_query($con, $sql);

    $output = '';

    $output.= '
    <table>
        <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact No.</th>
            <th>Status</th>
            <th>Option</th>
            </tr>
        </thead>
    <tbody>';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {

            switch ($row['user_status']) {
                case 0:
                    $statusoutput = '<p>Pending</p>';
                    break;
                case 1:
                    $statusoutput = '<p>Approved</p>';
                    break;
                case 2:
                    $statusoutput = '<p>Banned</p>';
                    break;
            }

            if($row["user_verification"] === '1'){
                $output.= '
                <tr>
                    <td>
                        <img width="5%" src="../user/user_data/user_avatar/'.$row["user_avatar"].'">
                        <p>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .' <i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i></p>
                    </td>
                    <td>'. $row['user_email'] .'</td>
                    <td>'. $row['user_contactno'] .'</td>
                    <td>'. $statusoutput .'</td>
                    <td><a class="status completed" style="border: none; outline: none;" href="/admin/userOption?userUUID='. $row['user_uuid'] .'">Modify</a></td>
                </tr>
                ';  
            }else{
                $output.= '
                <tr>
                    <td>
                        <img width="5%" src="../user/user_data/user_avatar/'.$row["user_avatar"].'">
                        <p>'. $row['user_first_name'] . ' ' . $row['user_last_name'] .' </p>
                    </td>
                    <td>'. $row['user_email'] .'</td>
                    <td>'. $row['user_contactno'] .'</td>
                    <td>'. $statusoutput .'</td>
                    <td><a class="status completed" style="border: none; outline: none;" href="/admin/userOption?userUUID='. $row['user_uuid'] .'">Modify</a></td>
                </tr>
                ';  
            }
        }
    }
    else{
        $output.= '
        <tr>
            <td colspan="5" style="text-align: center;">No user found.</th>
        </tr>
        ';
    }


    $output.= '
    </tbody>
    </table>
    ';

    echo $output;
?>