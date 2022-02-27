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
                    //Vaccine Card Front
                    $card_front = $_FILES['card_front']['tmp_name'];
                    $card_front_name = $_FILES['card_front']['name'];
                    $xcard_front = base64_encode(file_get_contents(addslashes($card_front)));
                    //Vaccine Card Back
                    $card_back = $_FILES['card_back']['tmp_name'];
                    $card_back_name = $_FILES['card_back']['name'];
                    $xcard_back = base64_encode(file_get_contents(addslashes($card_back)));      

                    //Profile Picture
                    $avatar = $_FILES['avatar']['tmp_name'];
                    $avatar_name = $_FILES['avatar']['name'];
                    $xavatar = base64_encode(file_get_contents(addslashes($avatar)));  

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
                            $sql = "
                            INSERT INTO 
                            users_tb(
                            user_uuid,user_email,user_password,user_contactno,user_avatar,
                            user_first_name,user_middle_name,user_last_name,user_birthday,
                            user_gender, user_country, user_zipcode, user_city, user_address,
                            user_card_front, user_card_back, user_vaccine, user_dose
                            )
                            VALUES( 
                                '$uuid','$email', '$encrypt_password', '$phone', '$xavatar',
                                '$fname', '$mname', '$lname', '$birthday',
                                '$gender', '$country', '$zipcode', '$city', '$address',
                                '$xcard_front', '$xcard_back', '$vaccine', '$dose'
                            )
                            ";
                            
                            $statement = $conn->prepare($sql);
                            $statement->execute([
                                ':user_uuid' => $uuid,
                                ':user_email' => $email,
                                ':user_password' => $encrypt_password,
                                ':user_contactno' => $phone,
                                ':user_avatar' => $xavatar,
                                ':user_first_name' => $fname,
                                ':user_middle_name' => $mname,
                                ':user_last_name' => $lname,
                                ':user_birthday' => $birthday,
                                ':user_gender' => $gender,
                                ':user_country' => $country,
                                ':user_zipcode' => $zipcode,
                                ':user_city' => $city,
                                ':user_address' => $address,
                                ':user_card_front' => $xcard_front,
                                ':user_card_back' => $xcard_back,
                                ':user_vaccine' => $vaccine,
                                ':user_dose' => $dose
                            ]);
        
                            // Close DB Connection
                            //$conn->close();
        
                            if (!$conn->error) {
                                header("Location: /user/register?success=Successfully Registered!");
                                }
                            else {
                                header("Location: /user/register?error=Failed to create your account!");
                            }
                        }
                    }        

            }
            else{
                header("Location: /user/register?error=Captcha failed, please try again.");			                
            }
    }

    
?>  