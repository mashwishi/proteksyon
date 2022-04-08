<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon");

    $UUIDx = $_POST['user_uuid'];

    if(isset($_POST["updateSettings"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UUID = $_POST['user_uuid'];
            $tempemail = $_POST['temp_email'];
            $tempcontact = (int)$_POST['temp_contactno'];

            $fName = $_POST['fName'];
            $mName = $_POST['mName'];
            $lName = $_POST['lName'];

            $email = $_POST['email'];
            $contact = (int)$_POST['contactno'];
            $address = $_POST['pAddress'];

            $status = (int)$_POST['status'];
            
            
            if(
            $fName != null || $mName != null ||$lName != null || $email != null || $contact != null || $address != null || $status != null ||
            $fName != '' || $mName != '' || $lName != '' || $email != '' || $contact != '' || $address != '' || $status != '' 
            ){


                //Check if there's same email
                $checkEmail = "SELECT * FROM users_tb where user_email = '$email' AND user_email != '$tempemail'";
                $resultEmail = mysqli_query($conn, $checkEmail);
                if(mysqli_num_rows($resultEmail) > 0){
                    header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=4');
                }else{
                    //Check if there's same contact no
                    $checkContact = "SELECT * FROM users_tb where user_contactno = $contact' AND user_email != '$tempcontact'";
                    $resultContact = mysqli_query($conn, $checkContact);
                    if(mysqli_num_rows($resultContact) > 0){
                        header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=5');
                    }else{
                        //Run this if no same email and contact
                        $sql = "UPDATE 
                                    users_tb 
                                SET 
                                    user_first_name='$fName', 
                                    user_middle_name='$mName', 
                                    user_last_name='$lName', 
                                    user_email='$email', 
                                    user_contactno=$contact, 
                                    user_address='$address',
                                    user_status=$status
                                WHERE 
                                    user_uuid = '$UUID'
                                ";
                        
                        if (mysqli_query($conn, $sql)) {
                            header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=0');
                            }
                        else {
                            header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=3');
                        }

                        // Close DB Connection
                        $conn -> close();  
                    }
                }

            }else{
                header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=2');
            }

        }else{
            header('Location: /admin/users/modify?UUID='.$UUIDx.'&updateSettings=1');
        }
    }
?>  