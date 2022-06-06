<?php

        //Exposed
        if ($row['status'] == 3)
        {

            date_default_timezone_set('Asia/Manila');

            $stamp = date('Y-m-d', strtotime($row["timestamp"]));
            $today = date('Y-m-d', time());
      
      
            $date1 = new DateTime($stamp); //inclusive
            $date2 = new DateTime($today); //exclusive
            $diff = $date2->diff($date1);
            $totaldays = $diff->format("%a");

            
            if($row['report_status'] == 2){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Notice:</strong> This person is already recovered, Preview of the previous data only.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
                ';
            }
            if($row['report_status'] == 1){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Notice:</strong> This person is currently under investigation/quarantine.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>  
                ';
            }

            echo '
            <a class="btn btn-outline-dark" href="javascript:generatePDF()" id="downloadButton"><i class="fas fa-file"></i>&nbsp;Download as PDF</a>
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
            </div>';

            echo '<div id="sectionPrint" class="">
            <div class="row">
                <div class="col-sm-9">';

                echo '
                <h4><strong>Person:</strong> '. $row['user_first_name'] .' '. $row['user_last_name'] .'</h4>';

                if($row['report_status'] == 1){
                    if($totaldays == 0){
                        echo '';
                    }else if($totaldays == 1){
                        echo '<strong>Quarantined Since: </strong> <span>' . $totaldays . ' day ago.</span><br/>';
                    }else if($totaldays < 14 && $totaldays != 0){
                        echo '<strong>Quarantined Since: </strong> <span>' . $totaldays . ' days ago.</span><br/>';
                    }else{
                        echo '<strong>Quarantined Since: </strong> <span style="color: red" class="blob">' . $totaldays . ' days ago.</span><br/>';
                    }
                }

                echo '
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
                <strong>Contact No.:</strong> '. $row['user_contactno'] .'<br/>
                <strong>Vaccine</strong> '. $row['user_vaccine'] .'<br/>
                <strong>Dose:</strong> '. $row['user_dose'] .'<br/>
                <hr/>
                <h4><strong>Informant:</strong> '. $row['establishment_name'] .'</h4>
                <strong>Date:</strong> '. $row['date'] .'<br/>
                <strong>Email:</strong> '. $row['establishment_email'] .'<br/>
                <strong>Contact No.:</strong> '. $row['establishment_contactno'] .'';

                echo '<hr/>
                <div class="col">
                <strong>Remarks / Note:</strong>
                <p>'. $row['message'] .'</p>
                </div>';
    

            echo '</div>
                <div class="col-sm-3">';
                $server_host_url = 'https://' . $_SERVER["HTTP_HOST"];
                $file_url = $server_host_url . '/establishment/establishment_data/evidences/' . $row['attachment'];
                $ext = pathinfo($row['attachment'], PATHINFO_EXTENSION);
                if(strtolower($ext) ==  'png' || strtolower($ext) ==  'jpg' || strtolower($ext) ==  'jpeg'){
                    echo '
     
                        <strong>Supporting Evidences</strong>
                        <div>
                            <img width="100%" src="../../establishment/establishment_data/evidences/' . $row['attachment'] . '" class="rounded" alt="'. $row['attachment'] .'">
                            <br/>
                            <a href="'. $file_url .'" target="_blank" class="btn"><i class="fas fa-file"></i> '. $row['attachment'] .' </a>
                        </div>';
                }else{
                    echo '
                        <strong>Supporting Evidences</strong>
                        <div>
                            <a href="'. $file_url .'" target="_blank" class="btn"><i class="fas fa-file"></i> '. $row['attachment'] .' </a>
                        </div>';
                }
                
            echo '
                </div>
            </div>';
            

            if($row['exported'] != NULL || $row['exported'] != '' ){
                $exported_table = '<strong>Exported Activities</strong>
                <p>This activities was provided by the establishment exported from their activity log</p>
                <div id="excel_data" class="mt-5"></div>
                <script type="text/javascript">
                (async() => {
                const workbook = XLSX.read(await (await fetch("https://proteksyon.ph/establishment/establishment_data/activities/'. $row['exported'] .'")).arrayBuffer());
                let output = [];
                workbook.SheetNames.forEach(name => {
                const worksheet = workbook.Sheets[name];
                const sheet_data = XLSX.utils.sheet_to_json(worksheet, {header:1});
                if(sheet_data.length > 0)
                    {
                        var table_output = "<table class=`table table-striped table-bordered`>";
                        for(var row = 0; row < sheet_data.length; row++)
                        {
                            table_output += "<tr>";
                            for(var cell = 0; cell < sheet_data[row].length; cell++)
                            {
                                if(row == 0)
                                {
                                    table_output += "<th>"+sheet_data[row][cell]+"</th>";
                                }
                                else
                                {
                                    table_output += "<td>"+sheet_data[row][cell]+"</td>";
                                }
                            }
                            table_output += "</tr>";
                        }
                        table_output += "</table>";
                        document.getElementById("excel_data").innerHTML = table_output;
                    }
                });
                })();
                </script>
                ';

                echo $exported_table;
            }

            echo '</div>
            </div></div>';



            if($row['report_status'] == 0){
                echo '
                <div id="alertInformation" style="margin-top: 10px;"></div>

                <div class="form-group" style="margin-bottom: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeCheck" value="0" name="rAgreeUpdate" value="1" onchange="valueChanged()">
                        <label class="form-check-label" for="gridCheck">
                            Have you check the person under investigation
                        </label>
                    </div>
                </div>
                    <div id="buttonsOption">
                        <input type="submit" name="startQuarantinePositive" class="btn btn-warning" value="Start Quarantine">
                        <input type="submit" name="deleteAppeal" class="btn btn-dark" value="Decline">
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
            else if($row['report_status'] == 1){
                echo '
                <div id="alertInformation" style="margin-top: 10px;"></div>

                <div class="form-group" style="margin-bottom: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeCheck" value="0" name="rAgreeUpdate" value="1" onchange="valueChanged()">
                        <label class="form-check-label" for="gridCheck">
                            Have you check the person under investigation
                        </label>
                    </div>
                </div>
                    <div id="buttonsOption">
                        <input type="submit" name="applyRecovered" class="btn btn-success" value="Recovered">
                        <input type="submit" name="deleteAppeal" class="btn btn-dark" value="Decline">
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
            else if($row['report_status'] == 2){
                echo '';
            }

            

            echo '
            ';

        }

?>