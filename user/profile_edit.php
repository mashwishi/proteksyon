<?php 
  session_start();

  require_once '../db_conn.php';

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {     
  $user_id = $_SESSION['user_id'];
  $user_uuid = $_SESSION['user_uuid'];
  $user_avatar =  $_SESSION['user_avatar'];

  $user_first_name = $_SESSION['user_first_name'];
  $user_middle_name = $_SESSION['user_middle_name'];
  $user_last_name = $_SESSION['user_last_name'];

  $user_gender = $_SESSION['user_gender'];
  $user_birthday = $_SESSION['user_birthday'];

  $user_country = $_SESSION['user_country'];
  $user_city = $_SESSION['user_city'];
  $user_address = $_SESSION['user_address'];

  $user_contactno = $_SESSION['user_contactno'];
?>
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


    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="../images/favicon.png">
    <title>Proteksyon | User</title>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- Java Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>-->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <!-- <script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> -->
    <script src="./assets/js/html2canvas.min.js"></script>

    <script type="text/javascript">   

      $(document).ready(function(){        
        var mobile = document.getElementById("mobile");
        var desktop = document.getElementById("desktop");
        var home = document.getElementById("Home");
        
          if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            mobile.style.display = "block";
            desktop.style.display = "none";
            mobile.style.display = "block";

            load_user_data();
            async function load_user_data(query)
            {
              $.ajax({
                url:"./settings/user_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#profile').html(data);
                  checkUpdate();
                }
              });
            }

            function checkUpdate()
            {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const msgUpdateInfo = urlParams.get('updateSettings');

                if(msgUpdateInfo == 0){
                    //Success
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your information has been successfully updated.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 1){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Failed to update your settings, You must agree to change or update your information.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 2){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Error!</strong> Failed to update your settings, You must not leave any blanks to change or update your information.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 3){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Failed to update your settings, There is a problem to connection! Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 4){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Please upload valid image format like JPEG, JPG, PNG, GIF.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 5){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Please upload valid image size (Max Upload Size: 10MB)<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 6){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> The password you input does not match to password confirmation<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else if(msgUpdateInfo == 7){
                    //Error not checked
                    $("#alertInformation").html('<div style="margin-bottom: 0rem !important;" class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Password incorrect, Please try again!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
                else{
                    //none
                }
            }

            load_status_data();
            function load_status_data(query)
            {
              $.ajax({
                url:"./settings/getInformation.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#Default  > .container').html(data);
                  $('#Profile  > .container').html(data);
                }
              });
            }    
            
            load_address_settings();
            function load_address_settings(query)
            {
              $.ajax({
                url:"./settings/getAddress.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#Address > .container').html(data);
                }
              });
            }  

            load_contact_settings();
            function load_contact_settings(query)
            {
              $.ajax({
                url:"./settings/getContact.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#Contact > .container').html(data);
                }
              });
            }  

          }
          else{
            mobile.style.display = "none";
            home.style.display = "none";
            desktop.style.display = "desktop";
          }
          
      }); 

      window.onload = function () {      

      };

    </script>   

  </head>
  <body>
    <div id="desktop"> 
      <div class="not-mobile"> 
          <p class="not-supported">
            <i class='fa fa-mobile fa-2x' style='color:#b5b4b0; margin-bottom: 15px;'></i>
            <br/> 
            Website application only support 
            <br/>
            mobile and tablet devices.
            <br/>
            <a href="logout" class="btn not-supported-logout-btn">Logout</a>
          </p>
      </div>
    </div>

    <div id="mobile"> 
    <!-- download pwa -->      
    <div class="add-to" style="background-color: #1965FF; color: white; font-size: 12px; display: flex;align-items: center; justify-content: center; padding: 12px 0px 12px 0px;">
      <center>    
          <button class="add-to-btn"><i class="fas fa-download"></i>&nbsp; Install Application on your Mobile Device</button>
      </center>
    </div> 

      <!-- profile header -->
      <header> 
        <div class="container">
          <div class="profile" id="profile">
          <div class="loader" id="loader"></div>
          </div>          
        </div>
      </header> 

      <!-- profile default --> 
      <div id="Default" style="display: block;" class="tabcontent">   
        <div class="container">
        </div>     
      </div>

      <!-- profile --> 
      <div id="Profile" class="tabcontent">
        <div class="container">
        </div>      
      </div>

      <!-- contact -->
      <div id="Contact" class="tabcontent">
        <div class="container">
        </div>      
      </div>

      <!-- security -->
      <div id="Security" class="tabcontent">
        <div class="container">
            <form action="./settings/changePassword.php" method="post" enctype="multipart/form-data">
                <div class="form-group"  style="margin-bottom: 10px">
                    <label for="OldPassword"><h3>Old Password</h3></label>
                    <input type="password" id="OldPassword" class="form-control" name="OldPassword">
                </div>
                <div class="form-group"  style="margin-bottom: 10px">
                    <label for="NewPassword"><h3>New Password</h3></label>
                    <input type="password" id="NewPassword" class="form-control" name="NewPassword">
                </div>
                <div class="form-group"  style="margin-bottom: 10px">
                    <label for="ConfirmPassword"><h3>Confirm Password</h3></label>
                    <input type="password" id="ConfirmPassword" class="form-control" name="ConfirmPassword" aria-describedby="passwordHelpBlock">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    Your password must be 8-32 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </small>
                </div>
                <div class="form-group"  style="margin-bottom: 10px">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="passwordCheck" name="passwordCheck">
                    <label class="form-check-label" for="passwordCheck">Do you agree to save your changes?</label>
                    </div>
                </div>
                <div class="form-group"  style="margin-bottom: 10px">
                    <input type="submit" value="Change Password" name="changePassword"
                        style="text-align:center !important; text-decoration:none; justify-content:center; align-items:center;
                        margin-left: 5px; margin-right: 5px;display: inline-block !important;padding: 5px 28px !important;
                        color: black !important;background-color: white !important;border: 0.1rem solid #dbdbdb !important;
                        font-size: 14px;font-weight: bold; !important;width: 100%;">
                </div>
            </form>
        </div>      
      </div>

      <!-- Address -->
      <div id="Address" class="tabcontent">
        <div class="container">             
        </div>      
      </div>    

      <!-- user menu -->
      <div class="menu">
      <div id="alertInformation"></div>
        <div class="tab">
          <div class="row">
            <div class="col">
              <button class="tablinks active" onclick="openCity(event, 'Profile')"><i class="far fa-user"></i><br/><span style="font-size: 7px">PROFILE</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Contact')"><i class="far fa-address-card"></i><br/><span style="font-size: 7px">OTHERS</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Security')"><i class="fas fa-lock"></i><br/><span style="font-size: 7px">SECURITY</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Address')"><i class="far fa-map"></i><br/><span style="font-size: 7px">ADDRESS</span></button>
            </div>
          </div>        
          
          
        </div>
      </div>

    </div>    
    
    <script type="text/javascript">
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('../sw.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
          });
        });
      }

      let deferredPrompt;
      var div = document.querySelector('.add-to');
      var button = document.querySelector('.add-to-btn');
      div.style.display = 'none';

      window.addEventListener('beforeinstallprompt', (e) => {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        div.style.display = 'block';

        button.addEventListener('click', (e) => {
        // hide our user interface that shows our A2HS button
        div.style.display = 'none';
        // Show the prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice
          .then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
              console.log('User accepted the A2HS prompt');
            } else {
              console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
          });
      });
      });

    </script>
    
  </body>
</html>
<?php 
  }
  else{
    header("Location: /user/login");
  }
?>