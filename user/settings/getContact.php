<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    include '../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT user_contactno, user_gender
    FROM users_tb WHERE user_id = $user_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))

            { 

                    //$less5 = date('d/m/Y', strtotime('-5 years')); //Max year
                    $output .= '
                    <form action="./settings/changeContact.php" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Contactno"><h3>Contact Number</h3></label>
                            <input type="number" id="Contactno" class="form-control" name="Contactno" value="'. $row["user_contactno"] . '" required onkeydown="limit(this);" onkeyup="limit(this);" oninput="limit(this);">
                            <script src="./settings/contactNumber.js"></script>
                        </div>';
                    if($row["user_gender"] == 'Male'){
                        $output .= '
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Gender"><h3>Gender</h3></label>
                            <select name="Gender" id="Gender" class="form-control" required>
                                <option value="Male" selected="selected">Male</option>
                                <option value="Female">Female</option>
                            </select>   
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contactnoCheck" name="contactnoCheck">
                            <label class="form-check-label" for="contactnoCheck">Do you agree to save your changes?</label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <input type="submit" value="Update Contact" name="changeContact" id="forNumber"
                                style="text-align:center !important; text-decoration:none; justify-content:center; align-items:center;
                                margin-left: 5px; margin-right: 5px;display: inline-block !important;padding: 5px 28px !important;
                                color: black !important;background-color: white !important;border: 0.1rem solid #dbdbdb !important;
                                font-size: 14px;font-weight: bold; !important;width: 100%;">
                        </div>
                    </form>';  
                    }else if($row["user_gender"] == 'Female'){
                        $output .= '
                        <div class="form-group" style="margin-bottom: 10px">
                            <label for="Gender"><h3>Gender</h3></label>
                            <select name="Gender" id="Gender" class="form-control" required>
                                <option value="Male" >Male</option>
                                <option value="Female" selected="selected">Female</option>
                            </select>   
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="contactnoCheck" name="contactnoCheck">
                            <label class="form-check-label" for="contactnoCheck">Do you agree to save your changes?</label>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 10px">
                            <input type="submit" value="Update Contact" name="changeContact"
                                style="text-align:center !important; text-decoration:none; justify-content:center; align-items:center;
                                margin-left: 5px; margin-right: 5px;display: inline-block !important;padding: 5px 28px !important;
                                color: black !important;background-color: white !important;border: 0.1rem solid #dbdbdb !important;
                                font-size: 14px;font-weight: bold; !important;width: 100%;">
                        </div>
                    </form>';        
                    }
        
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