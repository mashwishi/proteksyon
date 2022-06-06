<?php
    session_start();

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $query = "SELECT * FROM users_tb WHERE user_uuid = '$UUID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <h4>Modifiying '. $row['user_first_name'] .'</h4>


                    <div class="row row-cols-3" style="visibility:hidden;"> 
                        <div class="col">
                            <label for="tempinputEmail">Email</label>
                            <input type="email" class="form-control" id="tempinputEmail" name="temp_email" required value="'. $row['user_email'] .'">
                        </div>
                        <div class="col">
                            <label for="tempinputContact">Contact</label>
                            <input type="number" class="form-control" id="tempinputContact" name="temp_contactno" required value="'. $row['user_contactno'] .'">
                        </div>
                        <div class="col">
                        <input type="text" class="form-control" id="user_uuid" name="user_uuid" required value="'. $row['user_uuid'] .'">
                        </div> 
                    </div>



                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputfName">First Name</label>
                                <input type="text" class="form-control" id="inputfName" name="fName" required value="'. $row['user_first_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputmName">Middle Name</label>
                                <input type="text" class="form-control" id="inputmName" name="mName" required value="'. $row['user_middle_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputlName">Last Name</label>
                                <input type="text" class="form-control" id="inputlName" name="lName" required value="'. $row['user_last_name'] .'">
                            </div>
                        </div>
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required value="'. $row['user_email'] .'">
                            </div>
                            <div class="col">
                                <label for="inputContact">Contact</label>
                                <input type="number" class="form-control" id="inputContact" name="contactno" required value="'. $row['user_contactno'] .'" oninput="limit(this);" onkeydown="limit(this);" onkeyup="limit(this);">
                                <script src="./data/contactNumber.js"></script>
                            </div>
                            <div class="col">
                            <label for="status">Status</label>';


                        if($row['user_status'] === '0'){
                            $output .= '
                            <select name="status" id="status" class="form-control" required>
                                <option value="0" selected>Pending</option>
                                <option value="1">Approve</option>
                                <option value="2">Ban</option>
                            </select>  
                            ';
                        }elseif($row['user_status'] === '1'){
                            $output .= '
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1" selected>Approve</option>
                                <option value="2">Ban</option>
                            </select>  
                            ';
                        }elseif($row['user_status'] === '2'){
                            $output .= '
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Approve</option>
                                <option value="2" selected>Ban</option>
                            </select>  
                            ';
                        }else{
                            $output .= '
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Approve</option>
                                <option value="2">Ban</option>
                            </select>  
                            ';
                        }


                        $output .= '
                            </div>
                        </div>
                        <div class="col" style="margin-bottom: 10px;">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="pAddress" required value="'. $row['user_address'] .'">
                        </div>

                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" value="0" name="pAgreeUpdate">
                                <label class="form-check-label" for="gridCheck">
                                    Are you sure you want to save your changes?
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="updateSettings" class="btn btn-primary" id="forNumber" value="Update Settings">
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
                <strong>Error!</strong> Failed to get your informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>