<?php
    session_start();
    
    include '../../db_conn.php';

    $user_id = $_SESSION['user_id'];

    if(isset($_POST["changePassword"]))
    {
        $checkedfeild = $_POST["passwordCheck"];
        
        if(isset($checkedfeild)){
            

            $oldPass = md5($_POST['OldPassword']);
            $newPass = md5($_POST['NewPassword']);
            $confirmPass = md5($_POST['ConfirmPassword']);

            if(!empty($oldPass) || !empty($newPass) || !empty($confirmPass)){

                $connect = mysqli_connect("localhost", "root", "", "proteksyon.ml");
                $output = '';
            
                $query = "
                SELECT user_password
                FROM users_tb WHERE user_id = $user_id";
            
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){ 

                        if($row['user_password'] == $oldPass){

                            if($newPass == $confirmPass){
                                $sql = "UPDATE users_tb SET user_password='$newPass' WHERE user_id = $user_id";               
                                $statement = $conn->prepare($sql);
                                $statement->execute([
                                    ':user_password' => $newPass
                                ]);                            
                                if (!$conn->error) {
                                    header("Location: /user/profile_edit?updateSettings=0");
                                }
                                else {
                                    header("Location: /user/profile_edit?updateSettings=3");
                                }
                                // Close DB Connection
                                $conn -> close(); 
                                $connect -> close();   
                            }else{
                                header("Location: /user/profile_edit?updateSettings=6");
                            }

                        }else{
                            header("Location: /user/profile_edit?updateSettings=7");
                        }
                
                    }            
        
                    $connect -> close();  
                }
                else{
                    header("Location: /user/profile_edit?updateSettings=3");
                    $connect -> close();  
                }

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