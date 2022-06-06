<?php 
session_start();
include '../db_conn.php';

if (isset($_POST['establishment_email']) && isset($_POST['establishment_password'])) {

		$pemail = strtolower($_POST['establishment_email']);
		$ppassword = $_POST['establishment_password'];
	
		if (empty($pemail)) {
			header("Location: /establishment/login?error-email=Email is empty, please enter your email!");
		}
		else if (empty($ppassword)){
			header("Location: /establishment/login?error-password=Password should be between 8 and 32 characters&email=$pemail");
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
				
				$stmt = $conn->prepare("SELECT * FROM establishment_tb WHERE establishment_email=?");
				$stmt->execute([$pemail]);
		
				if ($stmt->rowCount() === 1) {

					$establishment = $stmt->fetch();

					$establishment_id = $establishment['establishment_id'];
					$establishment_verified = $establishment['establishment_verified'];

					$establishment_email = $establishment['establishment_email'];
					$establishment_password = $establishment['establishment_password'];

					$establishment_name = $establishment['establishment_name'];
					$establishment_contactno = $establishment['establishment_contactno'];

					$establishment_country = $establishment['establishment_country'];
					$establishment_city = $establishment['establishment_city'];
					$establishment_zipcode = $establishment['establishment_zipcode'];
					$establishment_address = $establishment['establishment_address'];

					$establishment_longitude = $establishment['establishment_longitude'];
					$establishment_latitude = $establishment['establishment_latitude'];
			
					$establishment_image = $establishment['establishment_image'];

					$establishment_approve = $establishment['approved'];
		
					if ($pemail === $establishment_email) {
						$passa = md5($ppassword);
						//$passa = $password;
						if ($passa === $establishment_password) {

							//Check if establishment is not yet approved
							if (0 == $establishment_approve) {	
								header("Location: /establishment/login?error=Your establishment account is pending for verification and it may took 3-7 business days, Thank you for your patience. &email=$email");				
							}
							else{
								$_SESSION['establishment_id'] = $establishment_id;
								$_SESSION['establishment_verified'] = $establishment_verified;

								$_SESSION['establishment_email'] = $establishment_email;
								$_SESSION['establishment_password'] = $establishment_password;

								$_SESSION['establishment_name'] = $establishment_name;
								$_SESSION['establishment_contactno'] = $establishment_contactno;

								$_SESSION['establishment_country'] = $establishment_country;
								$_SESSION['establishment_city'] = $establishment_city;
								$_SESSION['establishment_zipcode'] = $establishment_zipcode;
								$_SESSION['establishment_address'] = $establishment_address;

								$_SESSION['establishment_longitude'] = $establishment_longitude;
								$_SESSION['establishment_latitude'] = $establishment_latitude;

								$_SESSION['establishment_image'] = $establishment_image;
			
								header("Location: /establishment/");
							}
						}else {
							header("Location: /establishment/login?error-password=Incorrect password, Please try again!&email=$pemail");
						}
					}else {
						header("Location: /establishment/login?error-email=Incorrect email or password, Please try again!&email=$pemail");
					}

				}else {
					header("Location: /establishment/login?error-email=Account doesn't exist, Create an account.&email=$pemail");
				}
			}
			else {
				header("Location: /user/login?error-captcha=Captcha failed, please try again.");
			}
		}
		

	
	
}
