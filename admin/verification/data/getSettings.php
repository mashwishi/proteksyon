<?php
    session_start();

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "SELECT * FROM users_tb WHERE user_uuid = '$UUID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <h4>Verifying '. $row['user_first_name'] .'</h4>


                    <div class="row row-cols-1" style="visibility:hidden;"> 
                        <div class="col">
                        <input type="text" class="form-control" id="user_uuid" name="user_uuid" required value="'. $row['user_uuid'] .'">
                        </div> 
                    </div>

                    <div class="row row-cols-2" style="margin-bottom: 10px;">
                    <div class="col">
                    <label for="cardFront">Card Front</label>
                    <img class="img-fluid" id="cardFront" src="../../user/user_data/card_front/'.$row["user_card_front"].'" alt="'.$row["user_card_front"].'-cardFront">	
                </div>
                <div class="col">
                    <label for="cardBack">Card Back</label>
                    <img class="img-fluid" id="cardBack" src="../../user/user_data/card_back/'.$row["user_card_back"].'" alt="'.$row["user_card_back"].'-cardBack">	
                    </div>
                </div>
                

                    <div class="col">

                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputfName">First Name</label>
                                <input type="text" class="form-control" id="inputfName" name="fName" required readonly value="'. $row['user_first_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputmName">Middle Name</label>
                                <input type="text" class="form-control" id="inputmName" name="mName" required readonly value="'. $row['user_middle_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputlName">Last Name</label>
                                <input type="text" class="form-control" id="inputlName" name="lName" required readonly value="'. $row['user_last_name'] .'">
                            </div>
                        </div>
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" required readonly value="'. $row['user_email'] .'">
                            </div>
                            <div class="col">
                                <label for="inputContact">Contact</label>
                                <input type="number" class="form-control" id="inputContact" name="contactno" readonly  required value="'. $row['user_contactno'] .'">
                            </div>
                            <div class="col">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="city" readonly required value="'. $row['user_city'] .'">
                            </div>
                        </div>
                        <div class="col" style="margin-bottom: 10px;">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="pAddress" readonly required value="'. $row['user_address'] .'">
                        </div>

                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="inputvaccine">Vaccine</label>
                            <input type="text" class="form-control" id="inputvaccine" name="vaccine" readonly required value="'. $row['user_vaccine'] .'">
                        </div>
                        <div class="col">
                            <label for="inputdose">Dose</label>
                            <input type="text" class="form-control" id="inputdose" name="dose" required  readonly value="'. $row['user_dose'] .'">
                        </div>
                        <div class="col">
                            <label for="inputgender">Last Name</label>
                            <input type="text" class="form-control" id="inputgender" name="gender" readonly required value="'. $row['user_gender'] .'">
                        </div>
                    </div>

                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" value="0" name="pAgreeUpdate">
                                <label class="form-check-label" for="gridCheck">
                                    Are you sure you want to do the action?
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="approveVerify" class="btn btn-success" value="Approve">
                        <input type="submit" name="denyVerify" class="btn btn-secondary" value="Decline">
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