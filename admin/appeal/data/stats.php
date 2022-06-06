<?php
    session_start();

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $aquery = "SELECT COUNT(report_status) AS Recovered FROM user_reports WHERE report_status = 2";
    $aresult = mysqli_query($connect, $aquery);

    $bquery = "SELECT COUNT(report_status) AS PUI FROM user_reports WHERE report_status = 1";
    $bresult = mysqli_query($connect, $bquery);

    $cquery = "SELECT COUNT(report_status) AS Positive FROM user_reports WHERE status = 3 AND report_status = 0 OR status = 3 AND report_status = 1";
    $cresult = mysqli_query($connect, $cquery);

    $dquery = "SELECT COUNT(report_status) AS Exposed FROM user_reports WHERE status = 2 AND report_status = 0 OR status = 2 AND report_status = 1";
    $dresult = mysqli_query($connect, $dquery);
    
        if(mysqli_num_rows($aresult) > 0){
            $output .= '';
            while($arow = mysqli_fetch_array($aresult))
            {
                while($brow = mysqli_fetch_array($bresult))
                {          
                    while($crow = mysqli_fetch_array($cresult))
                    { 
                        while($drow = mysqli_fetch_array($dresult))
                        { 
                        $output .= '
                        <li>
                            <i class="bx bxs-calendar-check" ></i>
                            <span class="text">
                                <h3 class="counter" data-target="'.$arow["Recovered"].'" id="Recovered">~</h3>
                                <p>Recovered</p>
                            </span>
                        </li>
                        <li>
                            <i class="bx bxs-group" ></i>
                            <span class="text">
                                <h3 class="counter" data-target="'.$brow["PUI"].'" id="PUI">~</h3>
                                <p>Under Investigation</p>
                            </span>
                        </li>
                        <li>
                            <i class="bx bxs-virus"></i>
                            <span class="text">
                                <h3 class="counter" data-target="'.$crow["Positive"].'" id="Positive">~</h3>
                                <p>Positive</p>
                            </span>
                        </li>
                        <li>
                        <i class="bx bxs-virus"></i>
                        <span class="text">
                            <h3 class="counter" data-target="'.$drow["Exposed"].'" id="Exposed">~</h3>
                            <p>Exposed</p>
                        </span>
                        </li>

                        <script>
                            document.getElementById("Recovered").innerHTML = '.$arow["Recovered"].';
                            function fetch_stat() {
                                $("#Recovered").each(async function() {
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
                                
                                document.getElementById("PUI").innerHTML = '.$brow["PUI"].';
                                $("#PUI").each(async function() {
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
                                
                                document.getElementById("Positive").innerHTML = '.$crow["Positive"].';
                                $("#Positive").each(async function() {
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
                                
                                document.getElementById("Exposed").innerHTML = '.$drow["Exposed"].';
                                $("#Exposed").each(async function() {
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