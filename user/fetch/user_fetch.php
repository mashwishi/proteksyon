<?php
    session_start();

    $user_id = $_SESSION['user_id'];
    $connect = mysqli_connect("remotemysql.com", "C9eA1TETBR", "OdvWFvKWBw", "C9eA1TETBR");
    $output = '';

    $aquery = "SELECT * FROM users_tb where user_id = $user_id";
    $aresult = mysqli_query($connect, $aquery);

    $bquery = "SELECT COUNT(user_id) AS TotalPlaces FROM logs_tb where user_id =$user_id";
    $bresult = mysqli_query($connect, $bquery);

    $cquery = "SELECT COUNT(user_id) AS RecentPlaces FROM logs_tb where user_id = $user_id and DATE_FORMAT(logs_tb.time_in, '%Y-%m-%d') = CURDATE();";
    $cresult = mysqli_query($connect, $cquery);
    
        if(mysqli_num_rows($aresult) > 0){
            $output .= '';
            while($arow = mysqli_fetch_array($aresult))
            {
                while($brow = mysqli_fetch_array($bresult))
                {          
                    while($crow = mysqli_fetch_array($cresult))
                    {                             
                        $output .= '
                            <div class="profile-image" id="avatar">
                            <img style="width: 77px;" src="data:image/png;base64,'. base64_encode($arow["user_avatar"]) .'" alt="avatar"/>  
                            </div>
                            <div class="profile-user-settings">
                            <h1 class="profile-user-name">' . $arow["user_first_name"] . '                    
                            <i class="fas fa-check-circle" style="color: #1EF0F0" alt="verified"></i>
                            </h1>
                            <button class="btn profile-edit-btn">
                            ' . $arow["user_vaccine"] . ' - ' . $arow["user_dose"] . ' 
                            </button>
                            </div>
                            <div class="profile-stats">
                            <ul>
                            <li><span class="profile-stat-count" id="recent-places">~</span>Recent Acitivity</li>
                            <li><span class="profile-stat-count" id="total-places">~</span>Total Acitivity</li>
                            <li><span class="profile-stat-count" id="covid-stats-cases">~</span>Confirmed Cases</li>
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
                                    href="./profile_edit"
                                    >
                                    Edit Profile
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
                            <script>
                                                function covid_stats_ph() {
                                                    $.ajax({
                                                        url: "https://api.covid19api.com/live/country/Philippines",
                                                        headers: {  
                                                            "Access-Control-Allow-Origin": "*",
                                                            "Content-Type": "application/json"
                                                        },
                                                        success: function(getData){                            
                                                            if(getData.length > 0) {                                                           
                                                            const foundData = getData[getData.length - 1 ] //- latest or today
                                                            //const foundData = getData[16] //- custom array
                                                            
                                                            //get data print console
                                                            console.log(foundData);
                                    
                                                                if (foundData.ID != null) {
                                                                    if(foundData.Active != null) { 
                                                                        document.getElementById("covid-stats-cases").innerHTML = foundData.Active;
                                                                                                        
                                                                        $("#covid-stats-cases").each(async function() {
                                                                            $(this).prop("Counter", 0).animate({
                                                                            Counter: $(this).text()
                                                                            }, {
                                                                            duration: 1000,
                                                                            easing: "swing",
                                                                            step: function(now) {
                                                                                var formattedValue = nFormatter(Math.ceil(now), 2);
                                                                                $(this).text(formattedValue);
                                                                            }
                                                                            });
                                                                        });                                                    
                                                                        
                                                                        document.getElementById("recent-places").innerHTML = '.$crow["RecentPlaces"].';
                                                                        $("#recent-places").each(async function() {
                                                                            $(this).prop("Counter", 0).animate({
                                                                            Counter: $(this).text()
                                                                            }, {
                                                                            duration: 1000,
                                                                            easing: "swing",
                                                                            step: function(now) {
                                                                                var formattedValue = nFormatter(Math.ceil(now), 2);
                                                                                $(this).text(formattedValue);
                                                                            }
                                                                            });
                                                                        });  
                                    
                                                                        document.getElementById("total-places").innerHTML = '.$brow["TotalPlaces"].';
                                                                        $("#total-places").each(async function() {
                                                                            $(this).prop("Counter", 0).animate({
                                                                            Counter: $(this).text()
                                                                            }, {
                                                                            duration: 1000,
                                                                            easing: "swing",
                                                                            step: function(now) {
                                                                                var formattedValue = nFormatter(Math.ceil(now), 2);
                                                                                $(this).text(formattedValue);
                                                                            }
                                                                            });
                                                                        });                                        
                                                                        
                                                                        
                                                                        //reformat numbers
                                                                        function nFormatter(num, digits) {
                                                                            const si = [{
                                                                                value: 1,
                                                                                symbol: ""
                                                                            },
                                                                            {
                                                                                value: 1E3,
                                                                                symbol: "K"
                                                                            },
                                                                            {
                                                                                value: 1E6,
                                                                                symbol: "M"
                                                                            },
                                                                            {
                                                                                value: 1E9,
                                                                                symbol: "G"
                                                                            },
                                                                            {
                                                                                value: 1E12,
                                                                                symbol: "T"
                                                                            },
                                                                            {
                                                                                value: 1E15,
                                                                                symbol: "P"
                                                                            },
                                                                            {
                                                                                value: 1E18,
                                                                                symbol: "E"
                                                                            }
                                                                            ];
                                                                            const rx = /\.0+$|(\.[0-9]*[1-9])0+$/;
                                                                            let i;
                                                                            for (i = si.length - 1; i > 0; i--) {
                                                                            if (num >= si[i].value) {
                                                                                break;
                                                                            }
                                                                            }
                                                                            return (num / si[i].value).toFixed(digits).replace(rx, "$1") + si[i].symbol;
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }, 
                                                        error: function(){
                                                            console.log("Unable to load data.")
                                                        }
                                                    });
                                    
                                    }
                                    covid_stats_ph();                            
                            </script>
                                                    
                        ';
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
            <li><span class="profile-stat-count" id="recent-places">~</span>Recent Acitivity</li>
            <li><span class="profile-stat-count" id="total-places">~</span>Total Acitivity</li>
            <li><span class="profile-stat-count" id="covid-stats-cases">~</span>Confirmed Cases</li>
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
                    Edit Profile
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
        }
?>