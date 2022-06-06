<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $aquery = "SELECT COUNT(user_id) AS TotalTimein FROM logs_tb where establishment_id = $establishment_id";
    $aresult = mysqli_query($connect, $aquery);

    $bquery = "SELECT COUNT(DISTINCT user_id) AS UniqueVisitors FROM logs_tb";
    $bresult = mysqli_query($connect, $bquery);

    $cquery = "SELECT COUNT(*) AS TotalAppeal FROM user_reports WHERE `establishment_id` = $establishment_id;";
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
                        <li>
                        <i class="bx bxs-group"></i>
                        <span class="text">
                            <h3 class="counter" data-target="'.$arow["TotalTimein"].'" id="total-timein">~</h3>
                            <p>Total Time-in</p>
                        </span>
                        </li>
                        <li>
                            <i class="bx bxs-user" ></i>
                            <span class="text">
                                <h3 class="counter" data-target="'.$brow["UniqueVisitors"].'" id="visitors">~</h3>
                                <p>Unique Visitor</p>
                            </span>
                        </li>
                        <li>
                            <i class="bx bxs-file"></i>
                            <span class="text">
                                <h3 class="counter" data-target="'.$crow["TotalAppeal"].'" id="TotalAppeal">~</h3>
                                <p>Total Appeal</p>
                            </span>
                        </li>

                        <script>
                            document.getElementById("total-timein").innerHTML = '.$arow["TotalTimein"].';
                            function fetch_stat() {
                                $("#total-timein").each(async function() {
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
                                
                                document.getElementById("visitors").innerHTML = '.$brow["UniqueVisitors"].';
                                $("#visitors").each(async function() {
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
                                
                                document.getElementById("TotalAppeal").innerHTML = '.$crow["TotalAppeal"].';
                                $("#TotalAppeal").each(async function() {
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
                            fetch_stat();  
                        </script>                 
                        ';
                        // Close DB Connection
                        $connect -> close();  
                    }
                }
            }
            echo $output;
        }
        else{
            echo '
            <li>
            <i class="bx bxs-calendar-check" ></i>
            <span class="text">
                <h3 class="counter" data-target="0" id="total-timein">~</h3>
                <p>Total Time-in</p>
            </span>
            </li>
            <li>
                <i class="bx bxs-group" ></i>
                <span class="text">
                    <h3 class="counter" data-target="0" id="visitors">~</h3>
                    <p>Unique Visitors</p>
                </span>
            </li>
            <li>
                <i class="bx bxs-virus"></i>
                <span class="text">
                    <h3 class="counter" data-target="0" id="exposed">~</h3>
                    <p>Exposed to Covid</p>
                </span>
            </li>
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>