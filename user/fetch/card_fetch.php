<?php
    session_start();

    $user_id = $_SESSION['user_id'];
    $connect = mysqli_connect("remotemysql.com", "C9eA1TETBR", "OdvWFvKWBw", "C9eA1TETBR");
    $output = '';

    $query = "SELECT * FROM users_tb where user_id = $user_id";
    $result = mysqli_query($connect, $query);
    
        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {                        
                        $output .= '
                            <!--<img src="./assets/img/avatar/0.png" alt="QR" style="width:60%; margin-top: 20% !important; margin: auto;">-->

                                    <h3 style=" color: #000  !important; font-size: 20px  !important; font-weight: bold">
                                    '. $row["user_first_name"] .' '. $row["user_last_name"] .'                                
                                    </h3>
                                    <p>
                                        <span style="color: rgb(7, 7, 7)  !important; font-size: 25px  !important; font-weight: 500  !important">'. $row["user_vaccine"] .'</span>
                                        <br/>
                                        <span style="color: grey  !important; font-size: 15px  !important;">'. $row["user_dose"] .'</span>
                                    </p>
                        
                                    <div style="margin: 24px 0 50px  !important; font-size: 15px !important;">
                                        <p>VACCINATION CARD</p>
                                    </div>
                                    <div 
                                    style="border: none !important; outline: 0; padding: 5px 0px 5px 0px; color: white; background-color: #1864FE; text-align: center; cursor: pointer; width: 100%; font-size: 18px;">
                                       <p>PROTEKSYON</p>
                                    </div>                                                 
                        ';
            }
            echo $output;
        }
        else{
            echo '

            ';
        }
?>