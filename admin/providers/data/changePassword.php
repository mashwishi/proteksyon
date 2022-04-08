<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon");

    $provider_idx = $_POST['xx_provider_id'];

    if(isset($_POST["changePass"]))
    {

        if(isset($_POST['cAgreeUpdate'])){


            $newPass = $_POST['newPassowrd'];
            $conPass = $_POST['conPassowrd'];
            
            if($newPass != null || $conPass != null || $newPass != '' || $conPass != ''){

                if($newPass == $conPass){

                    $encPass = md5($newPass);

                    $sql = "UPDATE provider_tb 
                    SET provider_password = '$encPass'
                    WHERE provider_id = $provider_idx";
                    
                    if (mysqli_query($conn, $sql)) {
                        header('Location: /admin/providers/settings?ProviderID='.$provider_idx.'&updatePassword=0');
                        }
                    else {
                        header('Location: /admin/providers/settings?ProviderID='.$provider_idx.'&updatePassword=3');
                    }
    
                    // Close DB Connection
                    $conn -> close();  
                }else{
                    header('Location: /admin/providers/settings?ProviderID='.$provider_idx.'&updatePassword=4');
                }
            }else{
                header('Location: /admin/providers/settings?ProviderID='.$provider_idx.'&updatePassword=2');
            }

        }else{
            header('Location: /admin/providers/settings?ProviderID='.$provider_idx.'&updatePassword=1');
        }
    }
?>  