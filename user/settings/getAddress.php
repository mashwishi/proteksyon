<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    include '../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT user_country, user_address, user_city, user_zipcode
    FROM users_tb WHERE user_id = $user_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <form action="./settings/changeAddress.php" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Country"><h3>Country</h3></label>
                            <select name="Country" id="Country" class="form-control" value="'. $row["user_country"] . '" required>
                                <option value="Philippines">Philippines</option>
                            </select>   
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Address"><h3>Address</h3></label>
                            <input type="text" id="Address" class="form-control" name="Address" value="'. $row["user_address"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="City"><h3>City</h3></label>
                            <input type="text" id="City" class="form-control" name="City" value="'. $row["user_city"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Zipcode"><h3>Zip Code</h3></label>
                            <input type="text" id="Zipcode" class="form-control" name="Zipcode" value="'. $row["user_zipcode"] . '" required>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="addressCheck" name="addressCheck">
                            <label class="form-check-label" for="addressCheck">Do you agree to save your changes?</label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <input type="submit" value="Update Address" name="changeAddress"
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