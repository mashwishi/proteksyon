<?php 
session_start();
include '../db_conn.php';

    if(isset($_POST["cardUpdate"]))
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

                    $user_id = $_SESSION['user_id'];
                    $vaccine = $_POST['vaccine'];
                    $dose = $_POST['dose'];        
                    
                            
                    //Vaccine Card Front
                    //$card_front_name_temp = $_FILES["card_front"]["name"];
                    $card_front_name_temp = explode(".", $_FILES["card_front"]["name"]);
                    $card_front_name = round(microtime(true)) . '.' . end($card_front_name_temp);
                    $card_front_type = $_FILES["card_front"]["type"];
                    $card_front_size = $_FILES["card_front"]["size"];

                    //Vaccine Card Back
                    //$card_back_name_temp = $_FILES["card_back"]["name"];
                    $card_back_name_temp = explode(".", $_FILES["card_back"]["name"]);
                    $card_back_name = round(microtime(true)) . '.' . end($card_back_name_temp);
                    $card_back_type = $_FILES["card_back"]["type"];
                    $card_back_size = $_FILES["card_back"]["size"];
                    
                    // Check if file was uploaded without errors
                    if(isset($_FILES["card_front"]) && $_FILES["card_front"]["error"] == 0 || isset($_FILES["card_back"]) && $_FILES["card_back"]["error"] == 0){

                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                            
                        // Validate file extension
                        $card_front_ext = pathinfo($card_front_type, PATHINFO_EXTENSION);
                        $card_back_ext = pathinfo($card_front_type, PATHINFO_EXTENSION);

                        //if(!array_key_exists($card_front_ext, $allowed) || !array_key_exists($card_back_ext, $allowed) ){
                        //    header("Location: /user/request?error=Please upload valid image format like JPEG, JPG, PNG, GIF&email=$email");
                        //}
                    
                        // Validate file size - 10MB maximum
                        $maxsize = 10 * 1024 * 1024;
                        if($card_front_size > $maxsize || $card_back_size > $maxsize){
                            header("Location: /user/request?error=Please upload valid image size(Max Upload Size: 10MB)&email=$email");
                        }

                        // Validate type of the file
                        if( in_array($card_front_type, $allowed) || in_array($card_back_type, $allowed) ){
                            // Check whether file exists before uploading it
                            if(file_exists("upload/" . $card_front_name) ){
                                echo $filename . " is already exists.";
                            }else{
                                if(move_uploaded_file($_FILES["card_front"]["tmp_name"], "user_data/card_front/" . $card_front_name) && move_uploaded_file($_FILES["card_back"]["tmp_name"], "user_data/card_back/" . $card_back_name))
                                {

                                        date_default_timezone_set('Asia/Manila');
                                        $date_today = date('F j, Y g:i:A ');

                                        $sql = "
                                        INSERT INTO 
                                        request_tb(user_id, user_card_front, user_card_back, user_vaccine, user_dose, date)
                                        VALUES($user_id, '$card_front_name', '$card_back_name', '$vaccine', '$dose', '$date_today')";
                                        
                                        $statement = $conn->prepare($sql);
                                        $statement->execute([
                                            ':user_id' => $user_id,
                                            ':user_card_front' => $card_front_name,
                                            ':user_card_back' => $card_back_name,
                                            ':user_vaccine' => $vaccine,
                                            ':user_dose' => $dose,
                                            ':date' => $date_today
                                        ]);    
                                    
                                        
                                        if (!$conn->error) {

                                                //temporary send email on changes, not big deal

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
                                                $mail->From='verification@proteksyon.ml';
                                                $mail->FromName='Proteksyon';
                                                $mail->AddAddress($email, $fname . ' ' . $mname . ' ' . $lname);
                                                $mail->Subject  =  'Proteksyon - Virtual Card Update Request';
                                                $mail->IsHTML(true);
                                                $mail->Body    = '
                                                <h1>Confirm your changes</h1>
                                                </br>
                                                <strong>Did you made a request change on virtual card? If no please contact us at suppot@proteksyon.ml</strong>
                                                </br></br>
                                                <h3>Change Request:</h3>
                                                <p>
                                                <strong>Vaccine:</strong> ' . $vaccine . ' <br/>
                                                <strong>Dose: </strong> ' . $dose . ' <br/>
                                                </p>
                                                ';

                                                    //if($mail->Send())
                                                    //{
                                                    //    header("Location: /user/request?success=Request Successfully Sent, You may need to way 3-7days for the approval.");
                                                    //}
                                                    //else
                                                    //{
                                                    //    header("Location: /user/request?error=Failed to send update request, Please try again or contact us at suppot@proteksyon.ml");
                                                        //echo "Mail Error - >".$mail->ErrorInfo;
                                                    //}

                                                    header("Location: /user/request?success=Request Successfully Sent, You may need to wait 3-7days for the approval.");

                                            }
                                        else {
                                            header("Location: /user/request?error=Failed to send your request!");
                                        }
            
                                        // Close DB Connection
                                        $conn -> close();  

                                } else{
                                    header("Location: /user/request?error=Images file failed to upload, Please try again.");
                                }
                                
                            } 
                        } else{
                            header("Location: /user/request?error=Invalid type of image!");
                        }
                    } else{
                        header("Location: /user/request?error=Error upload your images!");
                    }
                            
                        
                            

            }
            else{
                header("Location: /user/request?error=Captcha failed, please try again.");			                
            }
    }
?>  