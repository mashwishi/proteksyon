<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';
    $query = "SELECT * FROM status_tb";
    $result = mysqli_query($connect, $query);
    

        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {
                    if($row['status_info'] == 'Open'){
                    $output .= '
                    <div class="container">         
                        <div class="row">
                            <ul id="status-ul-list">
                                <li id="status-list" style="background-image: linear-gradient(90deg,#11994e 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                    <h3>'. $row['status_name'] .'</h3>
                                    '. $row['status_desc'] .'<br/>
                                    <div class="status-right status-top text-success">
                                    '. $row['status_info'] .'
                                    </div>
                                </li>
                            </ul>
                        </div>            
                    </div> 
                    ';
                    }
                    else{
                        $output .= '
                        <div class="container">         
                                <div class="row">
                                <ul id="status-ul-list">
                                        <li id="status-list" style="background-image: linear-gradient(90deg,#fc3838 10px,rgb(238, 238, 238) 10px,#EEE 11px,transparent 11px);">
                                            <h3>'. $row['status_name'] .'</h3>
                                            '. $row['status_desc'] .'<br/>
                                            <div class="status-right status-top text-danger">
                                            '. $row['status_info'] .'
                                            </div>
                                        </li>
                                    </ul>
                            </div>            
                        </div> 
                        ';
                    }                    
                }            
            echo $output;
        }
        else{
            echo '
            <div class="container">
                <div class="card-body">                
                    <div class="row">
                            <div class="col">                                            
                                    <div style="font-size: 30px; color: #24D080; float: right;">
                                    <i class="fas fa-exclamation-square"></i>
                                    </div>                   
                                    <div class="d-flex align-items-center">                                  
                                        <div>
                                        <span class="h3 d-block mb-0">Failed to load</span>
                                        </div>
                                            <div class="d-flex align-items-center ms-3 mt-n1">
                                            <span class="badge badge-xs badge-pill bg-soft-success text-success">
                                                404
                                            </span>
                                            </div>
                                    </div>
                                    <span class="d-block text-sm text-muted">
                                    Please try again.
                                    </span>
                            </div>
                    </div>
                </div>            
            </div>     
            ';
        }
?>