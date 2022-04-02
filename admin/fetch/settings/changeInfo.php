<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon");

    $provider_id = $_SESSION['provider_id'];

    if(isset($_POST["updateSettings"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

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

                $sql = "UPDATE provider_tb 
                SET provider_email='$email', 
                    provider_contactno=$contact, 
                    provider_name='$name', 
                    provider_address='$address', 
                    provider_longitude='$longitude', 
                    provider_latitude='$latitude'
                WHERE provider_id = '$provider_id'";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header("Location: /provider/settings?updateSettings=0");
                    }
                else {
                    header("Location: /provider/settings?updateSettings=3");
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header("Location: /provider/settings?updateSettings=2");
            }

        }else{
            header("Location: /provider/settings?updateSettings=1");
        }
    }
?>  