<?php 
session_start();

$user_id = $_SESSION['user_id'];

include '../../db_conn.php';

if(isset($_POST["changeInfo"]))
{
    $checkedfeild = $_POST["infoCheck"];
    if(isset($checkedfeild)){

        //Name
        $fname = $_POST['FirstName'];
        $mname = $_POST['MiddleName'];
        $lname = $_POST['LastName'];

        //Profile Picture
        //$avatar_name_temp = $_FILES["avatar"]["name"];
        $avatar_name_temp = explode(".", $_FILES["avatar"]["name"]);
        $avatar_name = round(microtime(true)) . '.' . end($avatar_name_temp);
        $avatar_type = $_FILES["avatar"]["type"];
        $avatar_size = $_FILES["avatar"]["size"];
        
        //If there's no avatar
        if ($_FILES["avatar"]["size"] == 0)
        {
            if(!empty($fname) || !empty($mname) || !empty($lname)){
                $sql = "UPDATE users_tb SET user_first_name='$fname', user_middle_name='$mname', user_last_name='$lname' WHERE user_id = $user_id";               
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':user_first_name' => $fname,
                    ':user_middle_name' => $mname,
                    ':user_last_name' => $lname
                ]);                            
                if (!$conn->error) {
                    header("Location: /user/profile_edit?updateSettings=0");
                    }
                else {
                    header("Location: /user/profile_edit?updateSettings=3");
                }
                // Close DB Connection
                $conn -> close();  
            }else{
                header("Location: /user/profile_edit?updateSettings=2");
            }
        }
        //If there's avatar
        else{
            // Check if file was uploaded without errors
            if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){
                
                // Validate file extension
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $avatar_ext = pathinfo($avatar_size, PATHINFO_EXTENSION);
                if(!array_key_exists($avatar_ext, $allowed) ){
                    header("Location: /user/profile_edit?updateSettings=4");
                }
                // Validate file size - 10MB maximum
                $maxsize = 10 * 1024 * 1024;
                if($avatar_size > $maxsize){
                    header("Location: /user/profile_edit?updateSettings=5");
                }

                // Validate type of the file
                if(in_array($avatar_type, $allowed)){

                    // Check whether file exists before uploading it
                    if(file_exists('../user_data/user_avatar/' . $avatar_name) ){
                        header("Location: /user/profile_edit?updateSettings=3");
                    }
                    else{
                        if(move_uploaded_file($_FILES["avatar"]["tmp_name"], "../user_data/user_avatar/" . $avatar_name)){
                            
                                $sql = "UPDATE users_tb SET user_avatar='$avatar_name', user_first_name='$fname', user_middle_name='$mname', user_last_name='$lname' WHERE user_id = $user_id";
                                $statement = $conn->prepare($sql);
                                $statement->execute([
                                    ':user_avatar' => $avatar_name,
                                    ':user_first_name' => $fname,
                                    ':user_middle_name' => $mname,
                                    ':user_last_name' => $lname
                                ]);                            
                                
                                if (!$conn->error) {
                                    header("Location: /user/profile_edit?updateSettings=0");
                                    }
                                else {
                                    header("Location: /user/profile_edit?updateSettings=3");
                                }

                                // Close DB Connection
                                $conn -> close();  

                        }
                        else{
                            header("Location: /user/profile_edit?updateSettings=3");
                        } 
                    } 

                }
                else{
                    header("Location: /user/profile_edit?updateSettings=4");
                }
            }
            else{
                header("Location: /user/profile_edit?updateSettings=3");
            }  
        }
    }else{
        header("Location: /user/profile_edit?updateSettings=1");
    }
}
?>  