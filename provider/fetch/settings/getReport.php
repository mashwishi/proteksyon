<?php

    session_start();

    $provider_id = $_SESSION['provider_id'];

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "SELECT user_id, user_first_name, user_middle_name, user_last_name FROM users_tb WHERE user_uuid = '$UUID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <h4>'. $row['user_first_name'] . ' '. $row['user_middle_name'] . ' '. $row['user_last_name'] . '</h4>

                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="UserUUID">UUID</label>
                                <input type="text" class="form-control" id="UserUUID" name="UserUUID" readonly value="'. $UUID .'"> 
                            </div>
                            <div class="col">
                                <label for="UserID">ID</label>
                                <input type="text" class="form-control" id="UserID" name="UserID" readonly value="'. $row['user_id'] .'">
                            </div>
                            <div class="col">
                                <label for="Reason">Reason</label>
                                <select name="Reason" id="Reason" class="form-control" required>
                                    <option value="Explosed to Covid">Explosed to Covid</option>
                                    <option value="Positive to Covid">Positive to Covid</option>
                                    <option value="Sharing QR Code">Sharing QR Code</option>
                                </select>   
                            </div>
                        </div>

                        <div class="col" style="margin-bottom: 10px;">
                            <label for="Message">Message</label>
                            <input type="text" class="form-control" id="Message" name="Message" value="">
                        </div>


                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" value="0" name="pAgreeUpdate">
                                <label class="form-check-label" for="gridCheck">
                                    Are you sure you want to report this user?
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="Report" class="btn btn-primary" value="Report">
                    </div>
                    ';                 
                }            
            echo $output;
            // Close DB Connection
            $connect -> close();  
        }
        else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to get user informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>