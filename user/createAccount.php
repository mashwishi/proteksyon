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
                    //Name
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    //Email and Mobile No.
                    $email = strtolower($_POST['email']);
                    $phone = (int)$_POST['phone'];
                    //Birthday and gender
                    $birthday = $_POST['birthday'];
                    $gender = $_POST['gender'];
                    //Password
                    $password = $_POST['pword'];
                    $encrypt_password = md5($password);
                    //Address
                    $country = $_POST['country'];
                    $city = $_POST['city'];
                    $zipcode = $_POST['zipcode'];
                    $address = $_POST['address'];
                    //Vaccine and Dose
                    $vaccine = $_POST['vaccine'];
                    $dose = $_POST['dose'];

                    //UUID
                    $uuid = '0x' . md5($email);

                    //Check if email already exist
                    $stmta = $conn->prepare("SELECT * FROM users_tb WHERE user_email=?");
                    $stmta->execute([$email]);
                    if ($stmta->rowCount() === 1) {
                        header("Location: /user/register?error=Email address already exist characters&email=$email");
                    }                
                    //if success no same email
                    else{                        
                        //Check if phone already used
                        $stmtb = $conn->prepare("SELECT * FROM users_tb WHERE user_contactno=?");
                        $stmtb->execute([$phone]);                    
                        if ($stmtb->rowCount() === 1) {
                            header("Location: /user/register?error=Mobile number already exist! characters&email=$email");
                        }
                        //if success no same phone
                        else{
                            
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

                            //Profile Picture
                            //$avatar_name_temp = $_FILES["avatar"]["name"];
                            $avatar_name_temp = explode(".", $_FILES["avatar"]["name"]);
                            $avatar_name = round(microtime(true)) . '.' . end($avatar_name_temp);
                            $avatar_type = $_FILES["avatar"]["type"];
                            $avatar_size = $_FILES["avatar"]["size"];
                            
                            // Check if file was uploaded without errors
                            if(
                                isset($_FILES["card_front"]) && $_FILES["card_front"]["error"] == 0 || 
                                isset($_FILES["card_back"]) && $_FILES["card_back"]["error"] == 0 || 
                                isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0 
                            ){

                                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                                    
                                // Validate file extension
                                $card_front_ext = pathinfo($card_front_type, PATHINFO_EXTENSION);
                                $card_back_ext = pathinfo($card_front_type, PATHINFO_EXTENSION);
                                $avatar_ext = pathinfo($avatar_size, PATHINFO_EXTENSION);

                                //if(!array_key_exists($card_front_ext, $allowed) || !array_key_exists($card_back_ext, $allowed) || !array_key_exists($avatar_ext, $allowed) ){
                                //    header("Location: /user/register?error=Please upload valid image format like JPEG, JPG, PNG, GIF&email=$email");
                                //}
                            
                                // Validate file size - 10MB maximum
                                $maxsize = 10 * 1024 * 1024;
                                if($card_front_size > $maxsize || $card_back_size > $maxsize || $avatar_size > $maxsize){
                                    header("Location: /user/register?error=Please upload valid image size(Max Upload Size: 10MB)&email=$email");
                                }

                                // Validate type of the file
                                if(in_array($card_front_type, $allowed) || in_array($card_back_type, $allowed) || in_array($avatar_type, $allowed) ){
                                    // Check whether file exists before uploading it
                                    if(file_exists("upload/" . $card_front_name) ){
                                        echo $filename . " is already exists.";
                                    }else{
                                        if(
                                            move_uploaded_file($_FILES["card_front"]["tmp_name"], "user_data/card_front/" . $card_front_name) && 
                                            move_uploaded_file($_FILES["card_back"]["tmp_name"], "user_data/card_back/" . $card_back_name) && 
                                            move_uploaded_file($_FILES["avatar"]["tmp_name"], "user_data/user_avatar/" . $avatar_name) 
                                        ){

                                                $sql = "
                                                INSERT INTO 
                                                users_tb(
                                                user_uuid,user_email,user_password,user_contactno,user_avatar,
                                                user_first_name,user_middle_name,user_last_name,user_birthday,
                                                user_gender, user_country, user_zipcode, user_city, user_address,
                                                user_card_front, user_card_back, user_vaccine, user_dose
                                                )
                                                VALUES( 
                                                    '$uuid','$email', '$encrypt_password', '$phone', '$avatar_name',
                                                    '$fname', '$mname', '$lname', '$birthday',
                                                    '$gender', '$country', '$zipcode', '$city', '$address',
                                                    '$card_front_name', '$card_back_name', '$vaccine', '$dose'
                                                )
                                                ";
                                                
                                                $statement = $conn->prepare($sql);
                                                $statement->execute([
                                                    ':user_uuid' => $uuid,
                                                    ':user_email' => $email,
                                                    ':user_password' => $encrypt_password,
                                                    ':user_contactno' => $phone,
                                                    ':user_avatar' => $avatar_name,
                                                    ':user_first_name' => $fname,
                                                    ':user_middle_name' => $mname,
                                                    ':user_last_name' => $lname,
                                                    ':user_birthday' => $birthday,
                                                    ':user_gender' => $gender,
                                                    ':user_country' => $country,
                                                    ':user_zipcode' => $zipcode,
                                                    ':user_city' => $city,
                                                    ':user_address' => $address,
                                                    ':user_card_front' => $card_front_name,
                                                    ':user_card_back' => $card_back_name,
                                                    ':user_vaccine' => $vaccine,
                                                    ':user_dose' => $dose
                                                ]);    
                                            
                                                
                                                if (!$conn->error) {

                                                        $link = "<a href='https://proteksyon.ml/user/verify?UUID=".$uuid."'>Click to verify your email</a>";

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
                                                        $mail->Subject  =  'Proteksyon - Email Verification';
                                                        $mail->IsHTML(true);
                                                        $mail->Body    = '
                                                        <h1>Confirm your email</h1>
                                                        </br>
                                                        <strong>Did you register this email to proteksyon.ml? If yes '.$link.'</strong>

                                                        <p>Copy and Paste this link if you can not click the hyper link:<br/>
                                                        https://proteksyon.ml/user/verify?UUID='.$uuid.'</p>

                                                        <p>If you are having trouble with out registration please contact us at suppot@proteksyon.ml</p>
                                                        ';

                                                            if($mail->Send())
                                                            {
                                                                header("Location: /user/register?success=Successfully Registered, You may also need check your email inbox/spam for email verification.");
                                                            }
                                                            else
                                                            {
                                                                header("Location: /user/register?error=Failed to send email verification please contact us at suppot@proteksyon.ml");
                                                                //echo "Mail Error - >".$mail->ErrorInfo;
                                                            }

                                                    }
                                                else {
                                                    header("Location: /user/register?error=Failed to create your account!");
                                                }
                    
                                                // Close DB Connection
                                                $conn -> close();  

                                        } else{
                                            header("Location: /user/register?error=Images file failed to upload, Please try again.&email=$email");
                                        }
                                        
                                    } 
                                } else{
                                    header("Location: /user/register?error=Invalid type of image&email=$email");
                                }
                            } else{
                                header("Location: /user/register?error=Error upload your images&email=$email");
                            }
                            
                        }
                    }        

            }
            else{
                header("Location: /user/register?error=Captcha failed, please try again.");			                
            }
    }
?>  