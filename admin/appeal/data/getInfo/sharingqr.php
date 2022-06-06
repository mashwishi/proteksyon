<?php

        //sharing QR
        if ($row['status'] == 0)
        {
            if($row['report_status'] == 4){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Notice:</strong> This person has been already banned!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
                ';

            }
            else if($row['report_status'] == 5){
                echo '                
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Notice:</strong> This person has been already unbanned, This is data preview only.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else{
                echo '';
            }

            echo '
            <div class="row row-cols-3" style="visibility:hidden;"> 
                <div class="col">
                    <input type="text" class="form-control" id="report_id" name="report_id" required readonly value="'. $row['report_id'] .'">
                </div> 
                <div class="col">
                    <input type="text" class="form-control" id="report_status" name="report_status" required readonly value="'. $row['report_status'] .'">
                </div> 
                <div class="col">
                    <input type="text" class="form-control" id="status" name="status" required readonly value="'. $row['status'] .'">
                </div> 
                <div class="col">
                    <input type="text" class="form-control" id="user_id" name="user_id" required readonly value="'. $row['user_id'] .'">
                </div> 
            </div>
            
            <div class="col">

            <div class="row row-cols-2" style="margin-bottom: 10px;">
                <div class="col">
                    <h4><strong>Reported:</strong> '. $row['user_first_name'] .' '. $row['user_last_name'] .'</h4>
                    <strong>Reason:</strong> ';

                    $status = $row["status"];
                    switch ($status) {
                      case "0":
                        echo 'Sharing QR Code';
                        break;
                      case "1":
                        echo 'Person Under Investigation';
                        break;
                      case "2":
                        echo 'Exposed to Covid';
                        break;
                      case "3":
                        echo 'Positive to Covid';
                        break;
                    }
                    echo '<br/>
                    <strong>Status:</strong> ';
                    $status = $row["report_status"];
                    switch ($status) {
                        case "0":
                            echo 'Pending/Active';
                        break;
                        case "1":
                            echo 'Person Under Investigation';
                        break;
                        case "2":
                            echo 'Recovered';
                        break;
                        case "3":
                            echo 'Fine';
                        break;
                        case "4":
                            echo 'Banned';
                        break;
                        case "5":
                            echo 'UnBanned';
                        break;
                    }
                    echo '
                    <br/>
                    <strong>Email:</strong> '. $row['user_email'] .'<br/>
                    <strong>Contact No.:</strong> '. $row['user_contactno'] .'
                </div>
                <div class="col">
                    <h4><strong>Reporter:</strong> '. $row['establishment_name'] .'</h4>
                    <strong>Date:</strong> '. $row['date'] .'<br/>
                    <strong>Email:</strong> '. $row['establishment_email'] .'<br/>
                    <strong>Contact No.:</strong> '. $row['establishment_contactno'] .'
                </div>
            </div>';


            $server_host_url = 'https://' . $_SERVER["HTTP_HOST"];
            $file_url = $server_host_url . '/establishment/establishment_data/evidences/' . $row['attachment'];
            $ext = pathinfo($row['attachment'], PATHINFO_EXTENSION);
            if(strtolower($ext) ==  'png' || strtolower($ext) ==  'jpg' || strtolower($ext) ==  'jpeg'){
                echo '
                <div class="col">
                    <strong>Supporting Evidences</strong>
                    <div>
                        <img width="40%" src="../../establishment/establishment_data/evidences/' . $row['attachment'] . '" class="rounded" alt="'. $row['attachment'] .'">
                        <br/>
                        <a href="'. $file_url .'" target="_blank" class="btn"><i class="fa fa-download"></i> Download Attachment | '. $row['attachment'] .' </a>
                    </div>
                </div>';
            }else{
                echo '
                <div class="col">
                    <strong>Supporting Evidences</strong>
                    <div>
                        <a href="'. $file_url .'" target="_blank" class="btn"><i class="fa fa-download"></i> Download Attachment: '. $row['attachment'] .' </a>
                    </div>
                </div>';
            }

            echo '
            <div class="col">
            <strong>Remarks / Note:</strong>
            <p>'. $row['message'] .'</p>
            </div>';

            if($row['report_status'] == 4){
                echo '
                <div id="alertInformation" style="margin-top: 10px;"></div>

                <div class="form-group" style="margin-bottom: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeCheck" value="0" name="rAgreeUpdate" onchange="valueChanged()">
                        <label class="form-check-label" for="agreeCheck">
                            Check if you approve to unban this user.
                        </label>
                    </div>
                </div>
                <div id="buttonsOptions">
                    <input type="submit" name="approveUnban" class="btn btn-danger" value="Unban">
                </div>
                <script type="text/javascript">
                    $("#buttonsOptions").hide();
                    function valueChanged()
                    {
                        if($("#agreeCheck").is(":checked"))   
                            $("#buttonsOptions").show();
                        else
                            $("#buttonsOptions").hide();
                    }
                </script>
                </div>
                ';
            }
            else if($row['report_status'] == 0){
                echo '
                <div id="alertInformation" style="margin-top: 10px;"></div>

                <div class="form-group" style="margin-bottom: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeCheck" value="0" name="rAgreeUpdate" onchange="valueChanged()">
                        <label class="form-check-label" for="agreeCheck">
                            Check to take an action to this user.
                        </label>
                    </div>
                </div>
                <div id="buttonsOptions">
                    <input type="submit" name="approveBan" class="btn btn-danger" value="Apply">
                    <input type="submit" name="deleteAppeal" class="btn btn-dark" value="Decline">
                </div>
                <script type="text/javascript">
                    $("#buttonsOptions").hide();
                    function valueChanged()
                    {
                        if($("#agreeCheck").is(":checked"))   
                            $("#buttonsOptions").show();
                        else
                            $("#buttonsOptions").hide();
                    }
                </script>
                </div>
                ';
            }
            else if($row['report_status'] == 5){
                echo '';
            }

            
        }

?>