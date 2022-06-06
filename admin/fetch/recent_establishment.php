<?php
    session_start();

    $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
    $output = '';

    $aquery = "SELECT * FROM establishment_tb ORDER BY establishment_id DESC LIMIT 5;";
    $aresult = mysqli_query($connect, $aquery);
    
        if(mysqli_num_rows($aresult) > 0){
            $output .= '';
            while($arow = mysqli_fetch_array($aresult))
            {
                if($arow['establishment_status'] == 'Open'){
                    $output .= '
                    <li class="completed">
                        <h6>'. $arow['establishment_name'] . '</h6>
                        <i class="bx bx-show-alt"></i>
                    </li>
                    ';
                }else if($arow['establishment_status'] == 'Closed'){
                    $output .= '
                    <li class="not-completed">
                        <h6>'. $arow['establishment_name'] . '</h6>
                        <i class="bx bx-hide"></i>
                    </li>
                    ';
                }else{
                    $output .= '';
                }          
            }            
            echo $output;
            // Close DB Connection
            $connect -> close();                     
        }
        else{
            echo '
            <li class="close">
                <p>No Provider</p>
                <i class="bx bx-error"></i>
            </li>
            ';           
            // Close DB Connection
            $connect -> close();  
        }
?>