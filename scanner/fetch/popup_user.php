<?php
    session_start();

    $UUID = isset($_POST["UUID"]) ? $_POST["UUID"] : '';

    $connect = mysqli_connect("localhost", "id18505495_mashwishi", "Q5]wp17O@/bcjoT~", "id18505495_proteksyon");
    $output = '';

    $query = "SELECT * FROM users_tb where user_uuid = '$UUID'";
    $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {                         
                        $output .= '                           
                        <div class="xcontainer" id="user_popup_output">
                            <img class="image" src="data:image/png;base64,'. base64_encode($row["user_avatar"]) .'" alt="user_avatar">
                            <div> 
                                <h2>'. $row["user_first_name"] .' '. $row["user_last_name"] .'</h2>
                                <h5>'. $row["user_country"] .', '. $row["user_city"] .'</h5>
                                <h5>'. $row["user_vaccine"] .' - '. $row["user_dose"] .'</h5>
                            </div>                     
                        </div>
                        <div class="container-approval"> 
                            <button id="approve" onclick="timeIn()" class="approve-btn btn-success">APPROVE</button>
                            <button id="cancel" onclick="scanAgain()" class="cancel-btn btn-danger">CANCEL</button>
                        </div>                                          
                        ';

            }
            echo $output;
        }
        else{
            echo '
                    <div class="xcontainer"  id="user_popup_output">
                    <img class="image" src="./assets/img/avatar/0.png" alt="user_avatar">
                    <div> 
                        <h2>User not found</h2>
                        <h5>Please try again, make sure that you are</h5>
                        <h5>scanning the qr code of Proteksyon.</h5>
                    </div>                     
                    </div>  
                    <div class="container-approval"> 
                    <button onclick="scanAgain()" class="scan-again-btn">TRY AGAIN</button>
                    </div>                        
            ';
        }
?>