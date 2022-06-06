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

  require_once './fetch/check_account.php';
  
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
    </script>
        <style>
                img[alt*="www.000webhost.com"] { display: none !important; }
        div.disclaimer{ display: none !important; }
    </style>

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

        load_user_data();
            function load_user_data(query)
            {
              $.ajax({
                url:"./fetch/check_account.php",
                method:"get",
                data:{query:query},
                success:function(data)
                {
                  $('').html(data);
                }
              });
        }
        
          if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            mobile.style.display = "block";
            desktop.style.display = "none";
            mobile.style.display = "block";

            load_user_data();
            function load_user_data(query)
            {
              $.ajax({
                url:"./fetch/user_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#profile').html(data);
                }
              });
            }

            load_status_data();
            function load_status_data(query)
            {
              $.ajax({
                url:"./fetch/status_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#Default').html(data);
                  $('#Home').html(data);
                }
              });
            }  

            load_logs_data();
            function load_logs_data(query)
            {
              $.ajax({
                url:"./fetch/logs_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#Log').html(data);
                }
              });
            }        
            
            load_card_data();
            function load_card_data(query)
            {
              $.ajax({
                url:"./fetch/card_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#card-details').html(data);
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
 
          function cardRequest() {
            window.location.href="/user/request";
          }   

          function generateQRCode() {
                let UUID = '<?php echo $user_uuid; ?>';
                if (UUID) {
                  let qrcodeContainer = document.getElementById("qrcode");
                  qrcodeContainer.innerHTML = "";
                  new QRCode(qrcodeContainer, UUID);
                  document.getElementById("qrcode-container").style.display = "block";

                  let xqrcodeContainer = document.getElementById("xqrcode");
                  xqrcodeContainer.innerHTML = "";
                  new QRCode(xqrcodeContainer, {
                    text: UUID,
                    width: 150,
                    height: 150,
                    colorDark: "#1B1B1B",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                  });
                  document.getElementById("xqrcode-container").style.display = "block";    
                  
                  


                }
                else {
                 //
                }
          }       
          generateQRCode();
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

      <!-- default --> 
      <div id="Default" style="display: block;" class="tabcontent">   
      <div class="loader" id="loader"></div>
      </div>

      <!-- home --> 
      <div id="Home" class="tabcontent">
        <div class="container">
        </div>      
      </div>
      <!-- qr -->
      <div id="QR" class="tabcontent">
        <div class="container">
          <!-- <p style="font-size: 12px; text-align: center;">Do not share your qr code on social media.</p> <div id="qrcode"></div>-->
          <div style="max-width: 400px; margin: 0 auto; padding: 20px;">
              <p class="qrcode-msg" style="font-size: 10px">Use this QR for contact tracing only, <br/> Do not share or upload your QR on social media.</p>
                <div id="qrcode-container">
                  <div id="qrcode" class="qrcode"></div>
                </div>
              <p class="qrcode-msg" style="font-size: 30px">SCAN ME</p>
          </div>
        
        </div>      
      </div>
      <!-- log -->
      <div id="Log" class="tabcontent">
        <div class="container">
        Log
        </div>      
      </div>
      <!-- card -->
      <div id="Card" class="tabcontent">
        <div class="container">

              <div class="row">
                <a href="/user/request" style="font-size: 15px; font-weight: 800; text-align: center !important; text-decoration: none; justify-content: center; align-items: center; margin-bottom: 5%; margin-top: 5%; margin-left: auto; margin-right: auto;  display: inline-block !important;  padding: 5px 28px !important;  color: black !important;  background-color: white !important;  border: 0.1rem solid #dbdbdb !important; width: 85%;">
                  Request Update
                </a>  
              </div>

                <div id="userID" style="border-color: #000 !important; box-shadow: 0 4px 8px 0 rgb(0 0 0 / 48%) !important; max-width: 300px  !important; margin: auto  !important; text-align: center  !important; font-family: arial  !important; border-style: dotted !important; border-width: thin  !important;">
                    <div id="xqrcode-container">
                      <div id="xqrcode" class="xqrcode">                  
                      </div>
                    </div>                  
                  <div id="card-details"></div>
                </div>                                  

                <div class="row">
                  <button id="downloadCardID" style="font-size: 15px; font-weight: 800; text-align: center !important; text-decoration: none; justify-content: center; align-items: center; margin-bottom: 15px; margin-top: 5%; margin-left: auto; margin-right: auto;  display: inline-block !important;  padding: 5px 28px !important;  color: black !important;  background-color: white !important;  border: 0.1rem solid #dbdbdb !important; width: 85%;">
                        Download
                  </button>  
                  <script type="text/javascript">
                      document.getElementById("downloadCardID").addEventListener("click", function() {
                        html2canvas(document.getElementById("userID")).then(function (canvas) {
                          var anchorTag = document.createElement("a");
                            document.body.appendChild(anchorTag);
                            //<div id="previewImg"></div>    
                            //document.getElementById("previewImg").appendChild(canvas);
                            anchorTag.download = "proteksyon_id.jpg";
                            anchorTag.href = canvas.toDataURL();
                            anchorTag.target = '_blank';
                            anchorTag.click();
                          });
                      });                      
                  </script>
                </div>                
        </div>      
      </div>    

      <!-- user menu -->
      <div class="menu">
        <div class="tab">
          <div class="row">
            <div class="col">
              <button class="tablinks active" onclick="openCity(event, 'Home')"><i class="fas fa-home"></i><br/><span style="font-size: 7px">HOME</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'QR')"><i class="fas fa-qrcode"></i><br/><span style="font-size: 7px">QR</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Log')"><i class="fas fa-list"></i><br/><span style="font-size: 7px">LOG</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Card')"><i class="far fa-clipboard"></i><br/><span style="font-size: 7px">CARD</span></button>
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