<?php
    session_start();

    include '../../db_conn.php';

    $establishment_id = $_SESSION['establishment_id'];

    include '../../mysqli_conn.php';
    $output = '';

    $query = "SELECT * FROM establishment_tb where establishment_id = '$establishment_id'";
    $result = mysqli_query($connect, $query);
    

        if(mysqli_num_rows($result) > 0){
            $output .= '';                    
            while($row = mysqli_fetch_array($result))
            {            
                
            
            $offce_status = 'Open';
            $sql = "UPDATE establishment_tb SET establishment_status = '$offce_status' WHERE establishment_id = '$establishment_id'";
        
            $statement = $conn->prepare($sql);
            $statement->execute([
                ':status_info' => $offce_status
            ]);                                       
                
                if (!$connect) {
                    echo '<p class="fade-out">Connection Error</p>';
                    // Close DB Connection
                    $connect -> close();  
                }                   
                else {
                    $output .= '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Office is now open!</strong> The office is now open and will now become available on user-end, Please re-do the method to close the office.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';               
                }

            }
            echo $output;   
            // Close DB Connection
            $connect -> close();     
        }
        else{
            echo '<p class="fade-out">Establishment ID Not Found</p>';
            // Close DB Connection
            $connect -> close();   
        }
?>
