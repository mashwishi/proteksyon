<?php
    session_start();

    $provider_id = $_SESSION['provider_id'];
    $connect = mysqli_connect("remotemysql.com", "C9eA1TETBR", "OdvWFvKWBw", "C9eA1TETBR");
    $output = '';

    $query = "SELECT * FROM provider_tb where provider_id = $provider_id";
    $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0){
            $output .= '';
            while($row = mysqli_fetch_array($result))
            {                         
                        $output .= '
                        <div>
                            <h2 style="margin-bottom: 0px !important">' . $row["provider_name"] .'</h2>
                        <div>                      
                        ';

            }
            echo $output;
        }
        else{
            echo '
            <div>
                <h2 style="margin-bottom: 0px !important"> Provider failed to load!</h2>
            <div>    
            ';
        }
?>