<?php

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $query = "SELECT * FROM users_tb where user_id = $user_id";
    $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result))
            {
                //check if user get ban - ajax
                if($row["user_status"] != '2'){
                    //do nothing
                    $connect -> close();
                }
                else{
                    $connect -> close();
                    header("Location: /user/logout");
                }
            }
        }
        else{
            $connect -> close();  
        }

?>