<?php
    session_start();

    $provider_id = $_SESSION['provider_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $query = "
    SELECT provider_email, provider_contactno, provider_name, provider_address, provider_longitude, provider_latitude
    FROM provider_tb WHERE provider_id = $provider_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <h4>Information</h4>
                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" id="inputName" name="pName" required value="'. $row['provider_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="pEmail" required value="'. $row['provider_email'] .'">
                            </div>
                            <div class="col">
                                <label for="inputContact">Contact</label>
                                <input type="text" class="form-control" id="inputContact" name="pContact" required value="'. $row['provider_contactno'] .'">
                            </div>
                        </div>
                        <div class="col" style="margin-bottom: 10px;">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="pAddress" required value="'. $row['provider_address'] .'">
                        </div>
                        <div class="row row-cols-2" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputLongitude">Longitude</label>
                                <input type="text" class="form-control" id="inputLongitude" name="pLongitude" required value="'. $row['provider_longitude'] .'"> 
                            </div>
                            <div class="col">
                                <label for="inputLatitude">Latitude</label>
                                <input type="text" class="form-control" id="inputLatitude" name="pLatitude" required value="'. $row['provider_latitude'] .'">
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
                        <input type="submit" name="updateSettings" class="btn btn-primary" value="Update Settings">
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