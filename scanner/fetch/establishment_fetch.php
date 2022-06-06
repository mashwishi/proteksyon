<?php
    session_start();

    $establishment_id = $_SESSION['establishment_id'];
    include '../../mysqli_conn.php';
    $output = '';

    $query = "SELECT establishment_name FROM establishment_tb where establishment_id = $establishment_id";
    $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {                         
                        $output .= '
                        <div>
                            <h2 style="margin-bottom: 0px !important">' . $row["establishment_name"] .'</h2>
                        </div>                      
                        ';

            }
            echo $output;
            // Close DB Connection
            $connect -> close();  
        }
        else{
            echo '
            <div>
                <h2 style="margin-bottom: 0px !important"> Establishment failed to load!</h2>
            </div>    
            ';
            // Close DB Connection
            $connect -> close();  
        }
?>