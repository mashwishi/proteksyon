<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-status-bar" content="#db4938">
    <meta name="theme-color" content="#db4938">
    <link rel="manifest" href="../manifest.json">

    <!-- ios support -->
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-256x256.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-384x384.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-512x512.png">
    <link href="../assets/images/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="../assets/images/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link rel="shortcut icon" href="../images/favicon.png">
        <title>Proteksyon | Email Verification</title>
        </script>
        <style>
                img[alt*="www.000webhost.com"] { display: none !important; }
        div.disclaimer{ display: none !important; }
        div.disclaimer{ display: none !important; }
    </style>
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <style>
            body {
            color:#414141;
            }
            .container {
            font-family: 'Helvetica Neue', Helvetica;
            text-align: center;
            padding: 5px; 
            }
            .text-container{
            width: 90%;
            max-width: 800px;
            font-weight: 300;
            margin: 0 auto;
            padding: 15px;
            padding-bottom: 15px;
            }
            h1{
            font-weight: 100;
            }
                a{
                text-decoration: none;
                color: none;
                }
            .button {
            padding: 15px;
            font-family: 'Helvetica Neue', Helvetica;
            text-size: 18px;
            color: white;
            background-color: #0079CE;
            border: 0;
            border-radius: 5px;
            margin: 10px;
            display: block;
            max-width: 200px;
            margin: auto;
            text-decoration: none;
            }
            p {
            line-height: 1.5;
            }
            .centered{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            }
        </style>
    </head>
    <body>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 0);

            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);

            $UUID = $params['UUID'];
            //$email =  $params['email'];

            include '../db_conn.php';

            if($UUID != '' || $UUID != null)
            {

                $stmt = $conn->prepare("SELECT * FROM users_tb WHERE user_uuid=?");
				$stmt->execute([$UUID]);

                if ($stmt->rowCount() === 1) {

                    $user = $stmt->fetch();
                    $user_verification = $user['user_verification'];	

                        if($user_verification == 0){

                            $sql = "UPDATE users_tb SET user_verification=1 WHERE user_uuid = '$UUID'";               
                            $statement = $conn->prepare($sql);
                            $statement->execute([
                                ':user_verification' => 1
                            ]);    

                            if (!$conn->error) {
                                echo '
                                <div class="container centered" id="mobile">
                                <div class= "text-container">
                                <h1><i class="fa fa-check-circle" aria-hidden="true" style="color: #0079CE;"></i> Email verified</h1>
                                <p>Congratulations, Your email is now verified to our website!</p>
                                <a href="/user/login" class= "button">Login now</a>
                                </div>
                                </div>
                                ';
                            }
                            else {
                                echo '
                                <div class="container centered" id="mobile">
                                <div class= "text-container">
                                <h1><i class="fa fa-times-circle-o" aria-hidden="true" style="color: #0079CE;"></i> Failed to Verify</h1>
                                <p>Oh no, Looks like you are having trouble with our system. Please try again later!</p>
                                <a href="/user/verify?UUID='. $UUID . '" class= "button">Try Again</a>
                                </div>
                                </div>
                                ';
                            }

                            // Close DB Connection
                            //$conn -> close();  

                        }else{

                            echo '
                            <div class="container centered" id="mobile">
                            <div class= "text-container">
                            <h1><i class="fa fa-check-circle" aria-hidden="true" style="color: #0079CE;"></i> Already verified</h1>
                            <p>Hhmm, Looks like your email is aleready verified to our website!</p>
                            <a href="/user/login" class= "button">Login now</a>
                            </div>
                            </div>
                            ';

                        }
                }else{

                    echo '
                    <div class="container centered" id="mobile">
                    <div class= "text-container">
                    <h1><i class="fa fa-times-circle-o" aria-hidden="true" style="color: #0079CE;"></i> Email Not Found</h1>
                    <p>Oh no, Looks like your email is not registered to our website!</p>
                    <a href="/user/register" class= "button">Register now</a>
                    </div>
                    </div>
                    ';

                }

            }
            else{

                echo '
                <div class="container centered" id="mobile">
                <div class= "text-container">
                <h1><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: #0079CE;"></i> Something went wrong</h1>
                <p>Oh no, Looks like we can not find your UUID</p>
                <a href="/user" class= "button">Go now</a>
                </div>
                </div>
                ';

            }
            ?>
            
            <?php  $msg; ?>
    </body>
</html>