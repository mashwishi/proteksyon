<?php
    $query = "SELECT * FROM establishment_tb WHERE establishment_uuid = '$UUID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $time = explode('-', $row['establishment_time'] );

                    $timeOpen = $time[0];
                    $timeClose = $time[1];

                    $output .= '
                    <h4>Verifying '. $row['establishment_name'] .'</h4>


                    <div class="row row-cols-1" style="visibility:hidden;"> 
                        <div class="col">
                        <input type="text" class="form-control" id="establishment_uuid" name="establishment_uuid" required value="'. $row['establishment_uuid'] .'">
                        </div> 
                    </div>';

                    $server_host_url = 'https://' . $_SERVER["HTTP_HOST"];
                    $file_url = $server_host_url . '/establishment/establishment_data/documents/' . $row['establishment_document'];
                    $ext = pathinfo($row['establishment_document'], PATHINFO_EXTENSION);
                    if(strtolower($ext) ==  'png' || strtolower($ext) ==  'jpg' || strtolower($ext) ==  'jpeg'){
                        $output .= '
                            <div class="row row-cols-1" style="margin-bottom: 10px;">
                            <div class="col"><label for="businessPermit">Legal Documents (Attached Image)</label>
                            <div>
                                <img width="100%" id="businessPermit" src="../../establishment/establishment_data/documents/' . $row['establishment_document'] . '" class="rounded" alt="'.$row["establishment_document"].'-document">
                                <br/>
                                <a href="'. $file_url .'" target="_blank" class="btn"><i class="fas fa-file"></i> '. $row['establishment_document'] .' </a>
                            </div>';
                    }else{
                        $output .= '
                        <div class="row row-cols-1" style="margin-bottom: 10px;">
                        <div class="col"><label for="businessPermit">Legal Documents (Attached Documents)</label>
                            <div>
                                <a href="'. $file_url .'" target="_blank" class="btn"><i class="fas fa-file"></i> '. $row['establishment_document'] .' </a>
                            </div>';
                    }
                    
                                    
                $output .= '</div>
                </div>
                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="eName">Establishment Name</label>
                                <input type="text" class="form-control" id="eName" name="eName" required readonly value="'. $row['establishment_name'] .'">
                            </div>
                            <div class="col">
                                <label for="inputOpen">Schedule Open</label>
                                <input type="time" class="form-control" id="inputOpen" name="inputOpen" required readonly value="'.date("H:i:s", strtotime($timeOpen)).'">
                            </div>
                            <div class="col">
                                <label for="inputlName">Schedule Close</label>
                                <input type="time" class="form-control" id="inputClose" name="inputClose" required readonly value="'.date("H:i:s", strtotime($timeClose)).'">
                            </div>
                        </div>
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" name="establishment_email" required readonly value="'. $row['establishment_email'] .'">
                            </div>
                            <div class="col">
                                <label for="inputContact">Contact</label>
                                <input type="number" class="form-control" id="inputContact" name="contactno" readonly  required value="'. $row['establishment_contactno'] .'">
                            </div>
                            <div class="col">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" name="city" readonly required value="'. $row['establishment_city'] .'">
                            </div>
                        </div>
                        <div class="col" style="margin-bottom: 10px;">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="pAddress" readonly required value="'. $row['establishment_address'] .'">
                        </div>

                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                        <div class="col">
                            <label for="longitude">Longitude (Optional)</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" readonly required value="'. $row['establishment_longitude'] .'">
                        </div>
                        <div class="col">
                            <label for="latitude">Latitude (Optional)</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required  readonly value="'. $row['establishment_latitude'] .'">
                        </div>
                        <div class="col">
                            <label for="UUID">Establishment UUID (Auto-Generated)</label>
                            <input type="text" class="form-control" id="UUID" name="UUID" readonly required value="'. $row['establishment_uuid'] .'">
                        </div>
                    </div>

                        <div id="alertInformation" style="margin-top: 10px;"></div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agreeCheck" name="pAgreeUpdate" " value="0"  value="1" onchange="valueChanged()">
                                <label class="form-check-label" for="agreeCheck">
                                    Check if you would like to take action.
                                </label>
                            </div>  
                        </div>

                        <div id="buttonsOption">
                        <input type="submit" name="approveEsta" class="btn btn-success" value="Approve">
                        <input type="submit" name="denyEsta" class="btn btn-secondary" value="Decline">
                        </div>
                        <script type="text/javascript">
                            $("#buttonsOption").hide();
                            function valueChanged()
                            {
                                if($("#agreeCheck").is(":checked"))   
                                    $("#buttonsOption").show();
                                else
                                    $("#buttonsOption").hide();
                            }
                        </script>
                        
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