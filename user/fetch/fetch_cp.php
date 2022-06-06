<?php
    session_start();
    
    include '../../db_conn.php';


    if(isset($_POST["changePassword"]))
    {
        $data = array(
            'secret' => '0xdFB82E7c8075cb50E930Faac5002A7214DA9C195',
            'response' => $_POST['h-captcha-response']
        );
        
        $ch = curl_init();                
        curl_setopt($ch, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);                
        $responseData = json_decode($response);

        //Register if success captcha
        if($responseData->success) {

            $forgot_password_key = $_POST['key'];
            $email = $_POST['email'];
            $newPass = md5($_POST['newpassword']);
            $confirmPass = md5($_POST['conpassword']);

            if(!empty($email) || !empty($newPass) || !empty($confirmPass) || !empty($forgot_password_key)){

                if($newPass == $confirmPass){
                    
                    include '../../mysqli_conn.php';
                    $output = '';
                
                    $query = "
                    SELECT *
                    FROM users_tb 
                    WHERE user_email = '$email' AND forgot_password = '$forgot_password_key'";
                
                    $result = mysqli_query($connect, $query);
                    
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){ 

                            if($row[forgot_password] != null){
                                $sql = "UPDATE users_tb SET user_password='$newPass',  forgot_password = null WHERE user_email = '$email'";               
                                $statement = $conn->prepare($sql);
                                $statement->execute([
                                    ':user_password' => $newPass,
                                    ':forgot_password' => null
                                ]);                            
                                if (!$conn->error) {
                                    header("Location: /user/forgot_password?success=Successfully Changed your Password!");
                                }
                                else {
                                    header("Location: /user/forgot_password?error=Failed to change your password!");
                                }
                                // Close DB Connection
                                $conn -> close(); 
                                $connect -> close(); 
                            }else{
                                header("Location: /user/forgot_password?error=Invalid Key, Password Confirmation has been already used.");
                                $conn -> close();
                                $connect -> close();  
                            }
                        }            
                        $connect -> close();  
                    }
                    else{
                        header("Location: /user/forgot_password?error=Invalid Request");
                        $connect -> close();  
                    }

                }
                else{
                    header("Location: /user/forgot_password?error=Password doesn't match, Please try again.");
                }
            }
            else{
                header("Location: /user/forgot_password?error=Error: Fill all the Blanks!");
            }

        }
        else{
            header("Location: /user/register?error=Captcha failed, please try again.");	
        }
    }
?>