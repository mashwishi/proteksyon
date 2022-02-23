<?php 
session_start();
include '../db_conn.php';

if (isset($_POST['scanner_email']) && isset($_POST['scanner_password'])) {

		$pemail = strtolower($_POST['scanner_email']);
		$ppassword = $_POST['scanner_password'];
	
		if (empty($pemail)) {
			header("Location: login?error-email=Email is empty, please enter your email!");
		}
		else if (empty($ppassword)){
			header("Location: login?error-password=Password should be between 8 and 32 characters&email=$pemail");
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
				$stmt = $conn->prepare("SELECT * FROM provider_tb WHERE provider_email=?");
				$stmt->execute([$pemail]);
		
				if ($stmt->rowCount() === 1) {

					$provider = $stmt->fetch();

					$provider_id = $provider['provider_id'];
					$provider_verified = $provider['provider_verified'];

					$provider_email = $provider['provider_email'];
					$provider_password = $provider['provider_password'];

					$provider_name = $provider['provider_name'];
					$provider_contactno = $provider['provider_contactno'];

					$provider_country = $provider['provider_country'];
					$provider_city = $provider['provider_city'];
					$provider_zipcode = $provider['provider_zipcode'];
					$provider_address = $provider['provider_address'];

					$provider_longitude = $provider['provider_longitude'];
					$provider_latitude = $provider['provider_latitude'];
			
					$provider_image = $provider['provider_image'];
		
					if ($pemail === $provider_email) {
						$passa = md5($ppassword);
						//$passa = $password;
						if ($passa === $provider_password) {

							$_SESSION['provider_id'] = $provider_id;
							$_SESSION['provider_verified'] = $provider_verified;

							$_SESSION['provider_email'] = $provider_email;
							$_SESSION['provider_password'] = $provider_password;

							$_SESSION['provider_name'] = $provider_name;
							$_SESSION['provider_contactno'] = $provider_contactno;

							$_SESSION['provider_country'] = $provider_country;
							$_SESSION['provider_city'] = $provider_city;
							$_SESSION['provider_zipcode'] = $provider_zipcode;
							$_SESSION['provider_address'] = $provider_address;

							$_SESSION['provider_longitude'] = $provider_longitude;
							$_SESSION['provider_latitude'] = $provider_latitude;

							$_SESSION['provider_image'] = $provider_image;

							//$ipv4 = $_SERVER['REMOTE_ADDR'];
							//$sql = "UPDATE users_tb SET ip_address='$ipv4' WHERE user_email='$email'";
		
							//if ($conn->query($sql) === TRUE) {
							//echo "IP updated successfully";
							//} else {
							//echo "Error updating IP: " . $conn->error;
							//}
		
							header("Location: /scanner/");
		
						}else {
							header("Location: /scanner/login?error-password=Incorrect password, Please try again!&email=$pemail");
						}
					}else {
						header("Location: /scanner/login?error-email=Incorrect email or password, Please try again!&email=$pemail");
					}
				}else {
					header("Location: /scanner/login?error-email=Account doesn't exist, Create an account.&email=$pemail");
				}
			}
			else {
				header("Location: /user/login?error-captcha=Captcha failed, please try again.");
			}
		}
		

	
	
}
