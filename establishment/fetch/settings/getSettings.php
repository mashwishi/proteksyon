<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    include '../../../mysqli_conn.php';
    $output = '';

    $query = "
    SELECT establishment_email, establishment_contactno, establishment_name, establishment_address, establishment_longitude, establishment_latitude,establishment_time
    FROM establishment_tb WHERE establishment_id = $establishment_id";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $time = explode(' - ', $row['establishment_time'] );

                    $timeOpen = $time[0];
                    $timeClose = $time[1];

                    $output .= '
                    
                    <div id="alertInformation" style="margin-top: 10px;"></div>

                    <h4>Information</h4>
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
                                <input type="text" class="form-control" id="inputContact" name="pContact" required value="'. $row['establishment_contactno'] .'">
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

                    <!-- schedule -->
                    <div class="row" style="margin-bottom: 1%; margin-top: 2%;" >
                        <form id="newSchule">
                            <h4>Schedule</h4>
                            <div class="col">
                                <div class="row row-cols-3" style="margin-bottom: 10px;">
                                    <div class="col">
                                        <label for="inputOpen">Openning</label>
                                        <input type="time" class="form-control" id="inputOpen" name="inputOpen" value="'.date("H:i:s", strtotime($timeOpen)).'">
                                    </div>
                                    <div class="col">
                                        <label for="inputClose">Closing</label>
                                        <input type="time" class="form-control" id="inputClose"  name="inputClose" value="'.date("H:i:s", strtotime($timeClose)).'">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 10px;">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="xxgridCheck" value="0" name="pxAgreeUpdate">
                                    <label class="form-check-label" for="xxgridCheck">
                                        Are you want to change your schedule?
                                    </label>
                                    </div>
                                </div>
                                <button type="submit" name="applySchedule"  class="btn btn-primary">Change Schedule</button>
                            </div>
                        </form>
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