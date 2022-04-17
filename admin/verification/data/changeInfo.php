<?php 
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "proteksyon");

    $UUIDx = $_POST['user_uuid'];

    if(isset($_POST["approveVerify"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UUID = $_POST['user_uuid'];
            $email = $_POST['email'];
            
            if($UUID != null || $UUID != ''){

                        $sql = "UPDATE 
                                    users_tb 
                                SET 
                                    user_status=1
                                WHERE 
                                    user_uuid = '$UUID'
                                ";
                        
                        if (mysqli_query($conn, $sql)) {

                            require_once('../../../PHPMailer/PHPMailerAutoload.php');

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
                            $mail->Subject  =  'Proteksyon - Verification';
                            $mail->IsHTML(true);
                            $mail->Body    = '
                            <h1>🎉 Congrats, Your account is now verified!</h1>
                            </br>
                            <strong>You may now use and login your account on Proteksyon.</strong>

                            <p>If you are having trouble loggin please contact us at suppot@proteksyon.ml</p>
                            ';

                                if($mail->Send())
                                {
                                    header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=0');
                                }
                                else
                                {
                                    header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=10');
                                }
                        }
                        else {
                            header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=3');
                        }

                        // Close DB Connection
                        $conn -> close();  

            }else{
                header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=2');
            }

        }else{
            header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=1');
        }
    }

    if(isset($_POST["denyVerify"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UUID = $_POST['user_uuid'];
            $email = $_POST['email'];
            
            if($UUID != null || $UUID != ''){

                        $sql = "DELETE FROM 
                                    users_tb 
                                WHERE 
                                    user_uuid = '$UUID'
                                ";
                        
                        if (mysqli_query($conn, $sql)) {

                            require_once('../../../PHPMailer/PHPMailerAutoload.php');

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
                            $mail->Subject  =  'Proteksyon - Verification';
                            $mail->IsHTML(true);
                            $mail->Body    = '
                            <h1>Verification Failed, Your account is rejected!</h1>
                            </br>

                            <strong>Your account maybe rejected with the following reasons:</strong>
                            </br>

                            <p>
                            - Address from the card did not match to the registered account<br/>
                            - Card must be outdated, invalid or blurred<br/>
                            - Invalid phone number or email<br/>
                            - There is already existing account with the same person
                            </p>

                            <p>If you are having trouble please contact us at suppot@proteksyon.ml</p>
                            ';

                                if($mail->Send())
                                {
                                    header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=0');
                                }
                                else
                                {
                                    header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=10');
                                }
                        }
                        else {
                            header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=3');
                        }

                        // Close DB Connection
                        $conn -> close();  

            }else{
                header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=2');
            }

        }else{
            header('Location: /admin/verification/modify?UUID='.$UUIDx.'&updateSettings=1');
        }
    }
?>  