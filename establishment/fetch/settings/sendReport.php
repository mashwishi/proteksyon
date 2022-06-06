<?php 
session_start();
include '../../../db_conn.php';

$establishment_id = $_SESSION['establishment_id'];

if(isset($_POST["Report"])){

        $UserUUID = $_POST['UserUUID'];
        $UserID = $_POST['UserID'];
        $status = $_POST['Reason'];
        $message = $_POST["Message"];

        date_default_timezone_set('Asia/Manila');
        $date_today = date('F j, Y g:i:A ');
                                
        //Evidences
        $evidences_name_temp = explode(".", $_FILES["evidences"]["name"]);
        $evidences_name = round(microtime(true)) . '.' . end($evidences_name_temp);
        $evidences_type = $_FILES["evidences"]["type"];
        $evidences_size = $_FILES["evidences"]["size"];

        //Exported Data
        $exported_data_name_temp = explode(".", $_FILES["exported_data"]["name"]);
        $exported_data_name = round(microtime(true)) . '.' . end($exported_data_name_temp);
        $exported_data_type = $_FILES["exported_data"]["type"];
        $exported_data_size = $_FILES["exported_data"]["size"];

        if($UserID != null || $UserID != '' || $status != null || $status != '' || $message != null || $message != '' || $evidences_name != null || $evidences_name != '')
        {
                // Check if file was uploaded without errors
                if(isset($_FILES["evidences"]) && $_FILES["evidences"]["error"] == 0 || isset($_FILES["exported_data"]) && $_FILES["exported_data"]["error"] == 0){

                    $allowed = array(
                        "jpg" => "image/jpg", 
                        "jpeg" => "image/jpeg",
                        "gif" => "image/gif",
                        "png" => "image/png",
                        "pdf" => "application/pdf",
                        "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                        "doc" => "application/msword",
                        "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                        "xls" => "application/vnd.ms-excel"

                    );
                        
                    // Validate file extension
                    $evidences_ext = pathinfo($evidences_size, PATHINFO_EXTENSION);
                    // Validate file extension
                    $exported_data_ext = pathinfo($exported_data_size, PATHINFO_EXTENSION);

                    // Validate file size - 10MB maximum
                    $maxsize = 10 * 1024 * 1024;
                    if($evidences_size > $maxsize || $exported_data_size > $maxsize){
                        header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=6");
                    }

                    // Validate type of the file
                    if(in_array($evidences_type, $allowed) || in_array($exported_data_type, $allowed) ){
                        // Check whether file exists before uploading it
                        if(file_exists("../../establishment_data/evidences/" . $evidences_name) || file_exists("../../establishment_data/evidences/" . $evidences_name)){
                            header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=5");
                        }else{

                            if(isset($_FILES["exported_data"]) && $_FILES["exported_data"]["error"] == 4){
                                if(move_uploaded_file($_FILES["evidences"]["tmp_name"], "../../establishment_data/evidences/" . $evidences_name)){
                                    $sql = "
                                    INSERT INTO user_reports(establishment_id, user_id, status, message, attachment, date)
                                    VALUES($establishment_id, $UserID, '$status', '$message', '$evidences_name', '$date_today')
                                    ";
                                    
                                    $statement = $conn->prepare($sql);
                                    $statement->execute([
                                        ':establishment_id' => $establishment_id,
                                        ':user_id' => $UserID,
                                        ':status' => $status,
                                        ':message' => $message,
                                        ':attachment' => $evidences_name,
                                        ':date' => $date_today
                                    ]);
                                
                                    if (!$conn->error) {
                                        header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=0");
                                    }
                                    else {
                                        header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                                    }

                                    // Close DB Connection
                                    $conn -> close();  
                                }
                                else{
                                    header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                                }
                            }else{
                                if( move_uploaded_file($_FILES["evidences"]["tmp_name"], "../../establishment_data/evidences/" . $evidences_name) &&
                                    move_uploaded_file($_FILES["exported_data"]["tmp_name"], "../../establishment_data/activities/" . $exported_data_name)){
                                        $sql = "
                                        INSERT INTO user_reports(establishment_id, user_id, status, message, attachment, exported, date)
                                        VALUES($establishment_id, $UserID, '$status', '$message', '$evidences_name', '$exported_data_name', '$date_today')
                                        ";
                                        
                                        $statement = $conn->prepare($sql);
                                        $statement->execute([
                                            ':establishment_id' => $establishment_id,
                                            ':user_id' => $UserID,
                                            ':status' => $status,
                                            ':message' => $message,
                                            ':attachment' => $evidences_name,
                                            ':exported' => $exported_data_name,
                                            ':date' => $date_today
                                        ]);
                                    
                                        if (!$conn->error) {
                                            header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=0");
                                        }
                                        else {
                                            header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                                        }

                                        // Close DB Connection
                                        $conn -> close();  

                                }
                                else{
                                    header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                                }
                            }
                        
                        } 
                    } else{
                        header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=4");
                    }
                }
                else{
                    header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=3");
                }
        
        }else{
            header("Location: /establishment/reportUser?userUUID=$UserUUID&updateSettings=2");
        }


}

?>  