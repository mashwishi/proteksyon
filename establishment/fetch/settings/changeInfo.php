<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $establishment_id = $_SESSION['establishment_id'];

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

                $sql = "UPDATE establishment_tb 
                SET establishment_email='$email', 
                    establishment_contactno=$contact, 
                    establishment_name='$name', 
                    establishment_address='$address', 
                    establishment_longitude='$longitude', 
                    establishment_latitude='$latitude'
                WHERE establishment_id = '$establishment_id'";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header("Location: /establishment/settings?updateSettings=0");
                    }
                else {
                    header("Location: /establishment/settings?updateSettings=3");
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header("Location: /establishment/settings?updateSettings=2");
            }

        }else{
            header("Location: /establishment/settings?updateSettings=1");
        }
    }

    if(isset($_POST["applySchedule"]))
    {

        if(isset($_POST['pxAgreeUpdate'])){

            //schedule
            $xinputOpen = strval($_POST['inputOpen']);
            $inputOpen = date("h:i A", strtotime($xinputOpen));

            $xinputClose = strval($_POST['inputClose']);
            $inputClose = date("h:i A", strtotime($xinputClose));


            $time_esta = strval($inputOpen) . " - " . strval($inputClose);
            
            if(
            $inputOpen != null || $inputClose != null || 
            $inputOpen != '' || $inputClose != '' 
            ){

                $sql = "UPDATE establishment_tb 
                SET establishment_time = '$time_esta'
                WHERE establishment_id = $establishment_id";
                
                if (mysqli_query($conn, $sql)) {
                    header("Location: /establishment/settings?updateSettings=0");
                    }
                else {
                    header("Location: /establishment/settings?updateSettings=3");
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header("Location: /establishment/settings?updateSettings=2");
            }

        }else{
            header("Location: /establishment/settings?updateSettings=1");
        }
    }
?>  