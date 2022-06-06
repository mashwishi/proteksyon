<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $establishment_idx = $_POST['establishment_id'];

    if(isset($_POST["updateSettings"]))
    {
 
        if(isset($_POST['pAgreeUpdate'])){

            $establishment_id = $_POST['establishment_id'];
            $name = $_POST['pName'];
            $email = $_POST['pEmail'];
            $contact = (int)$_POST['pContact'];
            $address = $_POST['pAddress'];
            $longitude = $_POST['pLongitude'];
            $latitude = $_POST['pLatitude'];
            
            if(
            $name != null || $email != null || $contact != null || $address != null || $longitude != null || $latitude  != null ||
            $name != '' || $email != '' || $contact != '' || $address != '' || $longitude != '' || $latitude  != ''
            ){

                $sql = "UPDATE establishment_tb 
                SET establishment_email='$email', 
                    establishment_contactno=$contact, 
                    establishment_name='$name', 
                    establishment_address='$address', 
                    establishment_longitude='$longitude', 
                    establishment_latitude='$latitude'
                WHERE establishment_id = '$establishment_id'";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updateSettings=0');
                    }
                else {
                    header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updateSettings=3');
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updateSettings=2');
            }

        }else{
            header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updateSettings=1');
        }
    }
?>  