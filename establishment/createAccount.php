<?php 
session_start();
include '../db_conn.php';

    if(isset($_POST["register"]))
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
                    //Establishment Name
                    $ename = $_POST['ename'];
                    //Email and Mobile No.
                    $email = strtolower($_POST['email']);
                    $phone = (int)$_POST['phone'];

                    //schedule
                    //$open = date("h:i A", $_POST['time_open']);
                    //$close = date("h:i A", $_POST['time_close']);

                    $xinputOpen = strval($_POST['time_open']);
                    $open = date("h:i A", strtotime($xinputOpen));

                    $xinputClose = strval($_POST['time_close']);
                    $close = date("h:i A", strtotime($xinputClose));



                    //Password
                    $password = $_POST['pword'];
                    $encrypt_password = md5($password);
                    //Address
                    $country = $_POST['country'];
                    $city = $_POST['city'];
                    $zipcode = $_POST['zipcode'];
                    $address = $_POST['address'];

                    //UUID
                    $uuid = '0x' . md5($email);

                    //Check if email already exist
                    $stmta = $conn->prepare("SELECT * FROM establishment_tb WHERE establishment_email=?");
                    $stmta->execute([$email]);
                    if ($stmta->rowCount() === 1) {
                        header("Location: /establishment/register?error=Email address already exist characters&email=$email");
                    }                
                    //if success no same email
                    else{                        
                        //Check if phone already used
                        $stmtb = $conn->prepare("SELECT * FROM establishment_tb WHERE establishment_contactno=?");
                        $stmtb->execute([$phone]);                    
                        if ($stmtb->rowCount() === 1) {
                            header("Location: /establishment/register?error=Mobile number already exist! characters&email=$email");
                        }
                        //if success no same phone
                        else{
                            
                            //Business Document
                            //$card_front_name_temp = $_FILES["business_document"]["name"];
                            $business_document_name_temp = explode(".", $_FILES["business_document"]["name"]);
                            $business_document_name = round(microtime(true)) . '.' . end($business_document_name_temp);
                            $business_document_type = $_FILES["business_document"]["type"];
                            $business_document_size = $_FILES["business_document"]["size"];

                            //Profile Picture
                            //$avatar_name_temp = $_FILES["avatar"]["name"];
                            $avatar_name_temp = explode(".", $_FILES["avatar"]["name"]);
                            $avatar_name = round(microtime(true)) . '.' . end($avatar_name_temp);
                            $avatar_type = $_FILES["avatar"]["type"];
                            $avatar_size = $_FILES["avatar"]["size"];
                            
                            // Check if file was uploaded without errors
                            if(
                                isset($_FILES["business_document"]) && $_FILES["business_document"]["error"] == 0 || 
                                isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0 
                            ){

                                $allowed = array(
                                    "jpg" => "image/jpg", 
                                    "jpeg" => "image/jpeg",
                                    "gif" => "image/gif",
                                    "png" => "image/png",
                                    "pdf" => "application/pdf",
                                    "docx" => "application/msword",
                                    "doc" => "application/msword"
                                );
                                    
                                // Validate file extension
                                $business_document_ext = pathinfo($business_document_type, PATHINFO_EXTENSION);
                                $avatar_ext = pathinfo($avatar_size, PATHINFO_EXTENSION);

                                //if(!array_key_exists($card_front_ext, $allowed) || !array_key_exists($card_back_ext, $allowed) || !array_key_exists($avatar_ext, $allowed) ){
                                //    header("Location: /user/register?error=Please upload valid image format like JPEG, JPG, PNG, GIF&email=$email");
                                //}
                            
                                // Validate file size - 10MB maximum
                                $maxsize = 10 * 1024 * 1024;
                                if($business_document_size > $maxsize || $avatar_size > $maxsize){
                                    header("Location: /establishment/register?error=Please upload valid image size(Max Upload Size: 10MB)&email=$email");
                                }

                                // Validate type of the file
                                if( in_array($business_document_type, $allowed) || in_array($avatar_type, $allowed) ){
                                    // Check whether file exists before uploading it
                                    if(file_exists("establishment_data/documents" . $business_document_name)){
                                        echo $filename . " is already exists.";
                                    }else{
                                        if(
                                            move_uploaded_file($_FILES["business_document"]["tmp_name"], "establishment_data/documents/" . $business_document_name) && 
                                            move_uploaded_file($_FILES["avatar"]["tmp_name"], "establishment_data/avatar/" . $avatar_name) 
                                        ){
                                            
                                            
                                            $time_esta = strval($open) . " - " . strval($close);

                                                $sql = "
                                                INSERT INTO 
                                                establishment_tb(
                                                establishment_uuid, establishment_name,
                                                establishment_email,establishment_password,
                                                establishment_contactno, establishment_time,
                                                establishment_image, establishment_document,
                                                establishment_country, establishment_zipcode, establishment_city, establishment_address
                                                )
                                                VALUES( 
                                                    '$uuid', '$ename',
                                                    '$email', '$encrypt_password', 
                                                    '$phone', '$time_esta',
                                                    '$avatar_name', '$business_document_name',
                                                    '$country', '$zipcode', '$city', '$address'
                                                )
                                                ";
                                                
                                                $statement = $conn->prepare($sql);
                                                $statement->execute([
                                                    ':establishment_uuid' => $uuid,
                                                    ':establishment_name' => $ename,
                                                    ':establishment_email' => $email,
                                                    ':establishment_password' => $encrypt_password,
                                                    ':establishment_contactno' => $phone,
                                                    ':establishment_time' => $time_esta,
                                                    ':establishment_image' => $avatar_name,
                                                    ':establishment_document' => $business_document_name,
                                                    ':establishment_country' => $country,
                                                    ':establishment_zipcode' => $zipcode,
                                                    ':establishment_city' => $city,
                                                    ':establishment_address' => $address
                                                ]);
                                            
                                                
                                                if (!$conn->error) {

                                                        $link = "<a href='https://proteksyon.ml/establishment/verify?UUID=".$uuid."'>Click to verify your email</a>";

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
                                                        $mail->AddAddress($email, $ename);
                                                        $mail->Subject  =  'Proteksyon - Email Verification';
                                                        $mail->IsHTML(true);
                                                        $mail->Body    = '
                                                        <h1>Confirm your email</h1>
                                                        </br>
                                                        <strong>Did you register your establishment with this email to proteksyon.ml? If yes '.$link.'</strong>

                                                        <p>Copy and Paste this link if you can not click the hyper link:<br/>
                                                        https://proteksyon.ml/establishment/verify?UUID='.$uuid.'</p>

                                                        <p>If you are having trouble with out registration please contact us at suppot@proteksyon.ml</p>
                                                        ';

                                                            if($mail->Send())
                                                            {
                                                                header("Location: /establishment/register?success=Successfully Registered, You may also need check your email inbox/spam for email verification.");
                                                            }
                                                            else
                                                            {
                                                                header("Location: /establishment/register?error=Failed to send email verification please contact us at suppot@proteksyon.ml");
                                                                //echo "Mail Error - >".$mail->ErrorInfo;
                                                            }

                                                    }
                                                else {
                                                    header("Location: /establishment/register?error=Failed to create your account!");
                                                }
                    
                                                // Close DB Connection
                                                $conn -> close();  

                                        } else{
                                            header("Location: /establishment/register?error=Images file failed to upload, Please try again.&email=$email");
                                        }
                                        
                                    } 
                                } else{
                                    header("Location: /establishment/register?error=Invalid type of image&email=$email");
                                }
                            } else{
                                header("Location: /establishment/register?error=Error upload your images&email=$email");
                            }
                            
                        }
                    }        

            }
            else{
                header("Location: /establishment/register?error=Captcha failed, please try again.");			                
            }
    }
?>  