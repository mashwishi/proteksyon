<?php
    session_start();

    $connect = mysqli_connect("localhost", "root", "", "proteksyon");
    $output = '';

    $aquery = "SELECT * FROM provider_tb ORDER BY provider_id DESC LIMIT 5;";
    $aresult = mysqli_query($connect, $aquery);

    $bquery = "SELECT * FROM status_tb LIMIT 5";
    $bresult = mysqli_query($connect, $bquery);
    
        if(mysqli_num_rows($aresult) > 0){
            $output .= '';
            while($arow = mysqli_fetch_array($aresult))
            {
                while($brow = mysqli_fetch_array($bresult))
                {   
                    if($brow['status_info'] == 'Open'){
                        $output .= '
                        <li class="completed">
                            <h6>'. $brow['status_name'] . '</h6>
                            <i class="bx bx-show-alt"></i>
                        </li>
                        ';
                    }else if($brow['status_info'] == 'Closed'){
                        $output .= '
                        <li class="not-completed">
                            <h6>'. $brow['status_name'] . '</h6>
                            <i class="bx bx-hide"></i>
                        </li>
                        ';
                    }else{
                        $output .= '';
                    }
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