<?php
    session_start();

    $establishment_id = isset($_POST["EstablishmentID"]) ? $_POST["EstablishmentID"] : '';

    include '../../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT establishment_id, establishment_email, establishment_contactno, establishment_name, establishment_address, establishment_longitude, establishment_latitude
    FROM establishment_tb WHERE establishment_id = $establishment_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <h4>Modifiying '. $row['establishment_name'] .'</h4>
                    <div class="col">
                    <input type="text" style="visibility:hidden;" class="form-control" id="establishment_id" name="establishment_id" required value="'. $row['establishment_id'] .'">
                    </div>
                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="pName" required value="'. $row['establishment_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="pEmail" required value="'. $row['establishment_email'] .'">
                            </div>
                            <div class="col">
                                <label for="inputContact">Contact</label>
                                <input type="text" class="form-control" id="inputContact" name="pContact" required value="'. $row['establishment_contactno'] .'" oninput="limit(this);" onkeydown="limit(this);" onkeyup="limit(this);">
                                <script src="./data/contactNumber.js"></script>
                            </div>
                        </div>
                        <div class="col" style="margin-bottom: 10px;">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="pAddress" required value="'. $row['establishment_address'] .'">
                        </div>
                        <div class="row row-cols-2" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputLongitude">Longitude</label>
                                <input type="text" class="form-control" id="inputLongitude" name="pLongitude" required value="'. $row['establishment_longitude'] .'"> 
                            </div>
                            <div class="col">
                                <label for="inputLatitude">Latitude</label>
                                <input type="text" class="form-control" id="inputLatitude" name="pLatitude" required value="'. $row['establishment_latitude'] .'">
                            </div>
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
                        <input type="submit" name="updateSettings" class="btn btn-primary"  id="forNumber" value="Update Settings">
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