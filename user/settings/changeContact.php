<?php 
session_start();

$user_id = $_SESSION['user_id'];

include '../../db_conn.php';

if(isset($_POST["changeContact"]))
{
    $checkedfeild = $_POST["contactnoCheck"];
    
    if(isset($checkedfeild)){

        $contactno = (int)$_POST['Contactno'];
        $gender = $_POST['Gender'];

        if(!empty($contactno)){
                $sql = "UPDATE users_tb SET user_contactno=$contactno, user_gender='$gender' WHERE user_id = $user_id";               
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':user_contactno' => $contactno,
                    ':user_gender' => $gender
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
                header("Location: /user/profile_edit?updateSettings=2");
        }

    }
    else{
        header("Location: /user/profile_edit?updateSettings=1");
    }
}
?>  