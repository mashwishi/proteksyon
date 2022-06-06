<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon.ml");

    $user_idx = $_POST['user_id'];
    $request_idx = $_POST['request_id'];

    if(isset($_POST["approveRequest"]))
    {
 
        if(isset($_POST['rAgreeUpdate'])){

            $request_id = (int)$_POST['request_id'];
            $user_id = (int)$_POST['user_id'];
            $vaccine = $_POST['vaccine'];
            $dose = $_POST['dose'];
            $card_front = $_POST['card_front'];
            $card_back = $_POST['card_back'];
            
            if(
            $user_id != null || $vaccine != null || $dose != null || $card_front != null || $card_back != null || 
            $user_id != '' || $vaccine != '' || $dose != '' || $card_front != '' || $card_back != '' 
            ){

                $sql = "
                UPDATE 
                    users_tb, request_tb
                SET 
                    users_tb.user_dose='$dose', 
                    users_tb.user_vaccine='$vaccine', 
                    users_tb.user_card_front='$card_front', 
                    users_tb.user_card_back='$card_back',
                    request_tb.request_status=1
                WHERE
                    users_tb.user_id = $user_id
                AND 
                    request_tb.request_id = $request_id";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=0');
                    }
                else {
                    header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=3');
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=2');
            }

        }else{
            header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=1');
        }
    }

    if(isset($_POST["denyRequest"]))
    {
 
        if(isset($_POST['rAgreeUpdate'])){

            $request_id = $_POST['request_id'];
            
            if(
            $request_id != null || $request_id != '' 
            ){

                $sql = "DELETE FROM request_tb 
                WHERE request_id = '$request_id'";
                                        
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: /admin/requests/');
                    }
                else {
                    header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=3');
                }

                // Close DB Connection
                $conn -> close();  

            }else{
                header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=2');
            }

        }else{
            header('Location: /admin/requests/requestData?RequestID='.$request_idx.'&alertInformation=1');
        }
    }
?>  