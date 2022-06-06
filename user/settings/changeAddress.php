<?php 
session_start();

$user_id = $_SESSION['user_id'];

include '../../db_conn.php';

if(isset($_POST["changeAddress"]))
{
    $checkedfeild = $_POST["addressCheck"];

    if(isset($checkedfeild)){

        $Country = $_POST['Country'];
        $Address = $_POST['Address'];
        $City = $_POST['City'];
        $Zipcode = $_POST['Zipcode'];

        if(!empty($Country) || !empty($Address) || !empty($City) || !empty($Zipcode)){
                $sql = "UPDATE users_tb SET user_country='$Country', user_address='$Address', user_city='$City', user_zipcode='$Zipcode' WHERE user_id = $user_id";               
                $statement = $conn->prepare($sql);
                $statement->execute([
                    ':user_country' => $Country,
                    ':user_address' => $Address,
                    ':user_city' => $City,
                    ':user_zipcode' => $Zipcode
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