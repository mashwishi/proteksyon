<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $establishment_idx = $_POST['xx_establishment_id'];

    if(isset($_POST["changePass"]))
    {

        if(isset($_POST['cAgreeUpdate'])){


            $newPass = $_POST['newPassowrd'];
            $conPass = $_POST['conPassowrd'];
            
            if($newPass != null || $conPass != null || $newPass != '' || $conPass != ''){

                if($newPass == $conPass){

                    $encPass = md5($newPass);

                    $sql = "UPDATE establishment_tb 
                    SET establishment_password = '$encPass'
                    WHERE establishment_id = $establishment_idx";
                    
                    if (mysqli_query($conn, $sql)) {
                        header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updatePassword=0');
                        }
                    else {
                        header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updatePassword=3');
                    }
    
                    // Close DB Connection
                    $conn -> close();  
                }else{
                    header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updatePassword=4');
                }
            }else{
                header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updatePassword=2');
            }

        }else{
            header('Location: /admin/establishment/settings?EstablishmentID='.$establishment_idx.'&updatePassword=1');
        }
    }
?>  