<?php
    session_start();

    $user_id = $_SESSION['user_id'];
    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $aquery = "SELECT * FROM users_tb where user_id = $user_id";
    $aresult = mysqli_query($connect, $aquery);

    $bquery = "SELECT COUNT(user_id) AS TotalPlaces FROM logs_tb where user_id =$user_id";
    $bresult = mysqli_query($connect, $bquery);

    $cquery = "SELECT COUNT(user_id) AS RecentPlaces FROM logs_tb where user_id = $user_id and DATE_FORMAT(logs_tb.timestamp, '%Y-%m-%d') = CURDATE();";
    $cresult = mysqli_query($connect, $cquery);
    
        if(mysqli_num_rows($aresult) > 0){
            $output .= '';
            while($arow = mysqli_fetch_array($aresult))
            {
                while($brow = mysqli_fetch_array($bresult))
                {          
                    while($crow = mysqli_fetch_array($cresult))
                    { 
                        
                        if($arow["user_verification"] === '1'){
                            //verified
                            $output .= '
                            <div class="profile-image" id="avatar">
                            <img style="width: 77px;" src="user_data/user_avatar/'.$arow["user_avatar"].'" alt="avatar"/>  
                            </div>
                            <div class="profile-user-settings">
                            <h1 class="profile-user-name">' . $arow["user_first_name"] . '                    
                            <i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified-card"></i>
                            </h1>
                            <button class="btn profile-edit-btn">
                            ' . $arow["user_vaccine"] . ' - ' . $arow["user_dose"] . ' 
                            </button>
                            </div>
                            <div class="profile-stats">
                            <ul>
                            <li><h2>Profile Settings</h2></li>
                            </ul>
                            </div>
                            <div class="profile-bio">
                            <p>
                            <span class="profile-real-name">
                            +' . $arow["user_contactno"] . '        
                            </span>
                            <br/>
                            <i class="fas fa-map-marker-alt"></i> ' . $arow["user_country"] . ', ' . $arow["user_city"]  . ', ' . $arow["user_address"] .'
                            </p>

                                <div style="
                                margin: 0; 
                                display: flex;
                                justify-content: center;
                                align-items: center;">

                                    <a 
                                    style="
                                    text-align: center !important;
                                    text-decoration: none;
                                    justify-content: center;
                                    align-items: center;                                    
                                    margin-left: 5px; 
                                    margin-right: 5px; 
                                    display: inline-block !important; 
                                    padding: 5px 28px !important; 
                                    color: black !important; 
                                    background-color: white !important; 
                                    border: 0.1rem solid #dbdbdb !important;
                                    font-weight: bold !important;
                                    width: 40%;
                                    "
                                    href="./"
                                    >
                                    Home
                                    </a>

                                    <a 
                                    style="
                                    text-align: center !important;
                                    text-decoration: none;
                                    justify-content: center;
                                    align-items: center;                                    
                                    margin-left: 5px; 
                                    margin-right: 5px; 
                                    display: inline-block !important; 
                                    padding: 5px 28px !important; 
                                    color: black !important; 
                                    background-color: white !important; 
                                    border: 0.1rem solid #dbdbdb !important;
                                    font-weight: bold !important;
                                    width: 40%;
                                    "
                                    href="./logout">
                                    Logout
                                    </a>
                                </div>

                            </div>
                            <script src="assets/js/script.js"></script>

                                                    
                        ';
                        // Close DB Connection
                        $connect -> close();  
                        }else{
                        //not verified
                            $output .= '
                            <div class="profile-image" id="avatar">
                            <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($arow["user_avatar"]) .'" alt="avatar"/>  
                            </div>
                            <div class="profile-user-settings">
                            <h1 class="profile-user-name">' . $arow["user_first_name"] . '                    
                            </h1>
                            <button class="btn profile-edit-btn">
                            ' . $arow["user_vaccine"] . ' - ' . $arow["user_dose"] . ' 
                            </button>
                            </div>
                            <div class="profile-stats">
                            <ul>
                            <li><h2>Profile Settings</h2></li>
                            </ul>
                            </div>
                            <div class="profile-bio">
                            <p>
                            <span class="profile-real-name">
                            +' . $arow["user_contactno"] . '        
                            </span>
                            <br/>
                            <i class="fas fa-map-marker-alt"></i> ' . $arow["user_country"] . ', ' . $arow["user_city"]  . ', ' . $arow["user_address"] .'
                            </p>

                                <div style="
                                margin: 0; 
                                display: flex;
                                justify-content: center;
                                align-items: center;">

                                    <a 
                                    style="
                                    text-align: center !important;
                                    text-decoration: none;
                                    justify-content: center;
                                    align-items: center;                                    
                                    margin-left: 5px; 
                                    margin-right: 5px; 
                                    display: inline-block !important; 
                                    padding: 5px 28px !important; 
                                    color: black !important; 
                                    background-color: white !important; 
                                    border: 0.1rem solid #dbdbdb !important;
                                    font-weight: bold !important;
                                    width: 40%;
                                    "
                                    href="./"
                                    >
                                    Home
                                    </a>

                                    <a 
                                    style="
                                    text-align: center !important;
                                    text-decoration: none;
                                    justify-content: center;
                                    align-items: center;                                    
                                    margin-left: 5px; 
                                    margin-right: 5px; 
                                    display: inline-block !important; 
                                    padding: 5px 28px !important; 
                                    color: black !important; 
                                    background-color: white !important; 
                                    border: 0.1rem solid #dbdbdb !important;
                                    font-weight: bold !important;
                                    width: 40%;
                                    "
                                    href="./logout">
                                    Logout
                                    </a>
                                </div>



                            </div>
                            <script src="assets/js/script.js"></script>
                                                    
                        ';
                        // Close DB Connection
                        $connect -> close();  
                        }

                    }
                }
            }
            echo $output;
        }
        else{
            echo '
            <div class="profile-image" id="avatar">
            <img src="./img/avatar/0.png" alt="avatar"/>  
            </div>
            <div class="profile-user-settings">
            <h1 class="profile-user-name">User Error                  
            <i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified"></i>
            </h1>
            <button class="btn profile-edit-btn">
            XXXXXX - XXXXXX
            </button>
            </div>
            <div class="profile-stats">
            <ul>
            <li><h2>Profile Settings</h2></li>
            </ul>
            </div>
            <div class="profile-bio">
            <p>
            <span class="profile-real-name">
            +639000000000        
            </span>
            <br/>
            <i class="fas fa-map-marker-alt"></i> Failed to load
            </p>

                <div style="
                margin: 0; 
                display: flex;
                justify-content: center;
                align-items: center;">

                    <button 
                    style="
                    margin-left: 5px; 
                    margin-right: 5px; 
                    display: inline-block !important; 
                    padding: 5px 28px !important; 
                    color: black !important; 
                    background-color: white !important; 
                    border: 0.1rem solid #dbdbdb !important;
                    font-weight: bold !important;
                    width: 40%;
                    ">
                    Home
                    </button>

                    <button 
                    style="
                    margin-left: 5px; 
                    margin-right: 5px; 
                    display: inline-block !important; 
                    padding: 5px 28px !important; 
                    color: black !important; 
                    background-color: white !important; 
                    border: 0.1rem solid #dbdbdb !important;
                    font-weight: bold !important;
                    width: 40%;
                    ">
                    Logout
                    </button>
                </div>

            </div>
            <script  src="assets/js/script.js"></script>
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>