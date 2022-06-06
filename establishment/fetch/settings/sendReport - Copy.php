<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $establishment_id = $_SESSION['establishment_id'];
    
    $UserUUID = $_POST['UserUUID'];

    if(isset($_POST["Report"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UserID = $_POST['UserID'];
            $status = $_POST['Reason'];
            $message = $_POST["Message"];

            date_default_timezone_set('Asia/Manila');
            $date_today = date('F j, Y g:i:A ');
            
            if($UserID != null || $UserID != '' || $status != null || $status != ''  || $message != null || $message != '' ){

                $sql ="INSERT INTO user_reports(establishment_id, user_id, status, message, date) VALUES($establishment_id, $UserID, '$status', '$message', '$date_today')";             
                
                if (mysqli_query($conn, $sql)) {
                    header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=0");
                    }
                else {
                    header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=2");
            }

        }
        else{
            header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=1");
        }
    }
?>  