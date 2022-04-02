<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "
    SELECT user_first_name, user_middle_name, user_last_name
    FROM users_tb WHERE user_id = $user_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <form action="./settings/changeInfo.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="Avatar"><h3>Profile Picture</h3></label>
                            <input class="form-control" type="file" id="Avatar" name="avatar">
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="FirstName"><h3>First Name</h3></label>
                            <input type="text" id="FirstName" class="form-control" name="FirstName" value="'. $row["user_first_name"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="MiddleName"><h3>Middle Name</h3></label>
                            <input type="text" id="MiddleName" class="form-control" name="MiddleName" value="'. $row["user_middle_name"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="LastName"><h3>Last Name</h3></label>
                            <input type="text" id="LastName" class="form-control" name="LastName" value="'. $row["user_last_name"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="infoCheck" name="infoCheck" value="0">
                            <label class="form-check-label" for="infoCheck">Do you agree to save your changes?</label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <input type="submit" value="Update Contact" name="changeInfo"
                                style="text-align:center !important; text-decoration:none; justify-content:center; align-items:center;
                                margin-left: 5px; margin-right: 5px;display: inline-block !important;padding: 5px 28px !important;
                                color: black !important;background-color: white !important;border: 0.1rem solid #dbdbdb !important;
                                font-size: 14px;font-weight: bold; !important;width: 100%;">
                        </div>
                    </form>';                 
                }            
            echo $output;
            // Close DB Connection
            $connect -> close();  
        }
        else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to get your informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>