<?php

    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    include '../../../mysqli_conn.php';
    $output = '';

    $query = "SELECT user_id, user_first_name, user_middle_name, user_last_name FROM users_tb WHERE user_uuid = '$UUID'";

    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    $output .= '
                    <script>
                    $("#evidences").change(function(){
                        if($("#evidences").val()==""){
                            $("#sendButton").attr("disabled",true)
                        } 
                        else{
                          $("#sendButton").attr("disabled",false);
                        }
                    })
                    $("#exported_data_div").hide();
                    $("#Reason").change(function(){
                        if($("#Reason").val()=="0"){
                            $("#exported_data_div").hide();
                        } 
                        else{
                          $("#exported_data_div").show();;
                        }
                    })
                    </script>
                    <div class="col">
                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="UserName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="UserName" name="UserName" readonly value="'. $row['user_first_name'] . ' '. $row['user_middle_name'] . ' '. $row['user_last_name'] . '"> 
                            </div>
                            <div class="col">
                                <label for="UserUUID" class="form-label">UUID</label>
                                <input type="text" class="form-control" id="UserUUID" name="UserUUID" readonly value="'. $UUID .'"> 
                            </div>
                            <div class="col">
                                <label for="UserID" class="form-label">ID</label>
                                <input type="text" class="form-control" id="UserID" name="UserID" readonly value="'. $row['user_id'] .'">
                            </div>
                        </div>

                        <div class="row row-cols-3" style="margin-bottom: 10px;">
                            <div class="col">
                                <label for="evidences" class="form-label">Supporting Evidences (Strictly Required)</label>
                                <input class="form-control" type="file" id="evidences" name="evidences" accept=".png, .jpg, .jpeg, .pdf, .doc, .docx" required>
                                <small id="evidences" class="form-text text-muted">Supported File Format: .png, .jpg, jpeg, .pdf, .doc, .docx</small>
                            </div>
                            <div class="col">
                                <label for="Reason" class="form-label">Reason</label>
                                <select name="Reason" id="Reason" class="form-control" required>
                                    <option value="0">Sharing QR Code</option>
                                    <option value="1">Person Under Investigation</option>
                                    <option value="2">Exposed to Covid</option>
                                    <option value="3">Positive to Covid</option>
                                </select>   
                            </div>
                            <div class="col" id="exported_data_div">
                            <label for="exported_data" class="form-label">Exported Activities (If Applicable)</label>
                            <input class="form-control" type="file" id="exported_data" name="exported_data" accept=".xlsx">
                            <small id="exported_data" class="form-text text-muted">Supported File Format: .xlsx</small>
                            </div>
                        </div>

                        <div class="col" style="margin-bottom: 10px;">
                            <label for="Message">Remarks / Note:</label>
                            <textarea class="form-control" id="Message" name="Message"></textarea>
                        </div>

                        <div id="alertInformation" style="margin-top: 10px;"></div>
                        <input type="submit" name="Report" class="btn btn-primary" id="sendButton" value="Submit an Appeal" disabled>
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
                <strong>Error!</strong> Failed to get user informations, Please try again later.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>   
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>