<?php
    session_start();

    $RequestID = isset($_POST["RequestID"]) ? $_POST["RequestID"] : '';

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "
    SELECT 
        request_tb.request_id, 
        request_tb.user_id, 
        request_tb.request_status,
        users_tb.user_first_name,
        users_tb.user_last_name,
        users_tb.user_email,
        request_tb.user_vaccine, 
        request_tb.user_dose, 
        request_tb.user_card_front, 
        request_tb.user_card_back
    FROM
        users_tb
    INNER JOIN
        request_tb
    ON
        request_tb.user_id = users_tb.user_id
    WHERE
        request_tb.request_id = '$RequestID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){

            $output .= '';
            while($row = mysqli_fetch_array($result))
            {

                if($row['request_status'] == 1){
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Notice:</strong> This request is already applied!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>   
                    ';
                }else{
                    $output .= '
                    <h4>'. $row['user_first_name'] .' '. $row['user_last_name'] .'</h4>


                    <div class="row row-cols-6" style="visibility:hidden;"> 
                        <div class="col">
                        <input type="text" class="form-control" id="card_back" name="request_id" required readonly value="'. $row['request_id'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="card_back" name="user_id" required readonly value="'. $row['user_id'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="vaccine" name="vaccine" required readonly value="'. $row['user_vaccine'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="dose" name="dose" required readonly value="'. $row['user_dose'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="card_front" name="card_front" readonly required value="'. $row['user_card_front'] .'">
                        </div> 
                        <div class="col">
                        <input type="text" class="form-control" id="card_back" name="card_back" readonly required value="'. $row['user_card_back'] .'">
                        </div> 
                    </div>


                    <div class="col">

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
                        
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="vaccine">Vaccine</label>
                                <input type="text" class="form-control" id="vaccine" name="xvaccine" readonly required value="'. $row['user_vaccine'] .'">
                            </div>
                            <div class="col">
                                <label for="dose">Dose</label>
                                <input type="text" class="form-control" id="dose" name="xdose" readonly required value="'. $row['user_dose'] .'">
                            </div>
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" readonly required value="'. $row['user_email'] .'">
                            </div>
                        </div>


                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" value="0" name="rAgreeUpdate">
                                <label class="form-check-label" for="gridCheck">
                                    Are you sure you want to do this action?
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="approveRequest" class="btn btn-success" value="Approve">
                        <input type="submit" name="denyRequest" class="btn btn-secondary" value="Decline">
                    </div>
                    '; 
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