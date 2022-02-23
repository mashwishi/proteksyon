<?php 
session_start();
include '../db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

		$email = strtolower($_POST['email']);
		$password = $_POST['password'];
	
		if (empty($email)) {
			header("Location: login?error-email=Email is empty, please enter your email!");
		}
		else if (empty($password)){
			header("Location: login?error-password=Password should be between 8 and 32 characters&email=$email");
		}else{
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
			if($responseData->success) {
				$stmt = $conn->prepare("SELECT * FROM users_tb WHERE user_email=?");
				$stmt->execute([$email]);
		
				if ($stmt->rowCount() === 1) {

					$user = $stmt->fetch();
					$verification = $user['user_status'];	

					$user_data_id = $user['user_id'];
					$user_id = $user['user_uuid'];

					$user_password = $user['user_password'];		
					$user_email = $user['user_email'];

					$user_avatar = $user['user_avatar'];

					$user_first_name = $user['user_first_name'];
					$user_middle_name = $user['user_middle_name'];
					$user_last_name = $user['user_last_name'];

					$user_gender = $user['user_gender'];
					$user_birthday = $user['user_birthday'];

					$user_country = $user['user_country'];
					$user_city = $user['user_city'];
					$user_address = $user['user_address'];

					$user_contactno = $user['user_contactno'];

		
					if ($email === $user_email) {
						$passa = md5($password);
						//$passa = $password;
						if ($passa === $user_password) {

							$_SESSION['verification_status'] = $verification;

							$_SESSION['user_id'] = $user_data_id;
							$_SESSION['user_uuid'] = $user_id;
							$_SESSION['user_password'] = $user_password;
							$_SESSION['user_email'] = $user_email;

							$_SESSION['user_avatar'] = $user_avatar;

							$_SESSION['user_first_name'] = $user_first_name;
							$_SESSION['user_middle_name'] = $user_middle_name;
							$_SESSION['user_last_name'] = $user_last_name;

							$_SESSION['user_gender'] = $user_gender;
							$_SESSION['user_birthday'] = $user_birthday;

							$_SESSION['user_country'] = $user_country;
							$_SESSION['user_city'] = $user_city;
							$_SESSION['user_address'] = $user_address;

							$_SESSION['user_contactno'] = $user_contactno;

							

							//$ipv4 = $_SERVER['REMOTE_ADDR'];
							//$sql = "UPDATE users_tb SET ip_address='$ipv4' WHERE user_email='$email'";
		
							//if ($conn->query($sql) === TRUE) {
							//echo "IP updated successfully";
							//} else {
							//echo "Error updating IP: " . $conn->error;
							//}
		
							header("Location: /user/");
		
						}else {
							header("Location: /user/login?error-password=Incorrect password, Please try again!&email=$email");
						}
					}else {
						header("Location: /user/login?error-email=Incorrect email or password, Please try again!&email=$email");
					}
				}else {
					header("Location: /user/login?error-email=Account doesn't exist, Create an account.&email=$email");
				}
			}
			else {
				header("Location: /user/login?error-captcha=Captcha failed, please try again.");
			}
		}
		

	
	
}
