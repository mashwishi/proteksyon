<?php
if(isset($_POST["approveEsta"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UUID = $_POST['establishment_uuid'];
            $email = $_POST['establishment_email'];
            
            if($UUID != null || $UUID != ''){

                        $sql = "UPDATE 
                                    establishment_tb 
                                SET 
                                    approved=1
                                WHERE 
                                    establishment_uuid = '$UUID'
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
                            <h1>🎉 Congrats, Your Establishment account is now verified!</h1>
                            </br>
                            <strong>You may now use and login your establishment account on Proteksyon.</strong>

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

    if(isset($_POST["denyEsta"]))
    {

        if(isset($_POST['pAgreeUpdate'])){

            $UUID = $_POST['user_uuid'];
            $email = $_POST['email'];
            
            if($UUID != null || $UUID != ''){

                        $sql = "DELETE FROM 
                                    establishment_tb 
                                WHERE 
                                    establishment_uuid = '$UUID'
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
                            <h1>Verification Failed, Your Establishment account is rejected!</h1>
                            </br>

                            <strong>Your account maybe rejected with the following reasons:</strong>
                            </br>

                            <p>
                            - Address/Name from the documents did not match to the registered account<br/>
                            - Documents must be very outdated, invalid or blurred<br/>
                            - Invalid phone number or email<br/>
                            - There is already existing account with the same establishment
                            </p>

                            <p>If you are having trouble please contact us at suppot@proteksyon.ml</p>
                            ';

                                if($mail->Send())
                                {
                                    header('Location: /admin/verification/');
                                }
                                else
                                {
                                    header('Location: /admin/verification/');
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