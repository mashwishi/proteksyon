<?php 
session_start();
include '../db_conn.php';

    if(isset($_POST["requestPassword"]))
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

                    $email = strtolower($_POST['email']);

                    //Check if email already exist
                    $stmta = $conn->prepare("SELECT * FROM establishment_tb WHERE establishment_email=?");
                    $stmta->execute([$email]);

                    if ($stmta->rowCount() === 1) {
                        
                        $forgot_password_key = '0x' . md5($email) . md5(date());

                        $sql = "UPDATE establishment_tb 
                        SET establishment_forgotpw = '$forgot_password_key'
                        WHERE establishment_email = '$email'";
                        
                        $statement = $conn->prepare($sql);
                        $statement->execute([
                            ':establishment_forgotpw' => $forgot_password_key
                        ]);  
                    
                        if (!$conn->error) {

                                $link = "<a href='https://proteksyon.ml/establishment/cp?request=".$forgot_password_key."&email=".$email."'>Click to change your password</a>";

                                require_once('../PHPMailer/PHPMailerAutoload.php');

                                $mail = new PHPMailer();
                        
                                $mail->CharSet =  "utf-8";
                                $mail->IsSMTP();
                                // enable SMTP authentication
                                $mail->SMTPAuth = true;                  
                                // GMAIL username
                                $mail->Username = "proteksyonsabang@gmail.com";
                                // GMAIL password
                                $mail->Password = "ProteksyonThesis2022!?";
                                $mail->SMTPSecure = "ssl";  
                                // sets GMAIL as the SMTP server
                                $mail->Host = "smtp.gmail.com";
                                // set the SMTP port for the GMAIL server
                                $mail->Port = "465";
                                $mail->From='forgotpassword@proteksyon.ml';
                                $mail->FromName='Proteksyon';
                                $mail->AddAddress($email);
                                $mail->Subject  =  'Proteksyon - Forgot Password';
                                $mail->IsHTML(true);
                                $mail->Body    = '
                                <h1>Change your Password</h1>
                                </br>
                                <strong>Did you request change password for this establishment email to proteksyon.ml? If yes '.$link.'</strong>

                                <p>Copy and Paste this link if you can not click the hyper link:<br/>
                                https://proteksyon.ml/establishment/cp?request='.$forgot_password_key.'&email='.$email.'</p>

                                <p>If you are having trouble with out registration please contact us at suppot@proteksyon.ml</p>
                                ';

                                    if($mail->Send())
                                    {
                                        header("Location: /establishment/forgot_password?success=Successfully Requested, Check your email inbox/spam for change password request.");
                                    }
                                    else
                                    {
                                        header("Location: /establishment/forgot_password?error=Failed to send change password request please try again or contact us at suppot@proteksyon.ml");
                                        //echo "Mail Error - >".$mail->ErrorInfo;
                                    }

                            }
                        else {
                            header("Location: /establishment/forgot_password?error=Failed to request change password!");
                        }

                        // Close DB Connection
                        $conn -> close();  

                    }                
                    //if success no same email / account doesn't exsists in the database
                    else{         
                        header("Location: /establishment/forgot_password?error=Email address doesn't exist");
                    }        

            }
            else{
                header("Location: /establishment/forgot_password?error=Captcha failed, please try again.");			                
            }
    }
?>  