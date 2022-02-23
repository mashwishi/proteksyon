<?php 
  session_start();

  require_once '../db_conn.php';

  if (isset($_SESSION['provider_id']) && isset($_SESSION['provider_email'])) {   
    
  $provider_id =  $_SESSION['provider_id'];
  $provider_verified =  $_SESSION['provider_verified'];

  $provider_email =  $_SESSION['provider_email'];
  $provider_password =  $_SESSION['provider_password'];

  $provider_name =  $_SESSION['provider_name'];
  $provider_contactno =  $_SESSION['provider_contactno'];

  $provider_country =  $_SESSION['provider_country'];
  $provider_city =  $_SESSION['provider_city'];
  $provider_zipcode =  $_SESSION['provider_zipcode'];
  $provider_address =  $_SESSION['provider_address'];

  $provider_longitude =  $_SESSION['provider_longitude'];
  $provider_latitude =  $_SESSION['provider_latitude'];

  $provider_image = $_SESSION['provider_image'];

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="apple-mobile-web-app-status-bar" content="#db4938">
    <meta name="theme-color" content="#db4938">
    <link rel="manifest" href="../manifest.webmanifest">
    <!-- ios support -->
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-72x72.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-96x96.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-128x128.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-144x144.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-152x152.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-384x384.png">
    <link rel="apple-touch-icon" href="../assets/images/icons/icon-512x512.png">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="../images/favicon.png">
    <title></title>

    <!-- Style Sheets -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.1/tailwind.min.css">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- Java Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    
    <script type="text/javascript" src="https://webqr.com/llqrcode.js"></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <script type="text/javascript" src="./assets/js/webqr.js"></script>

    <script type="text/javascript">


      window.addEventListener('load', () => {
          //registerSW();      
      });
      
      //async function registerSW() {
      ////    if ('serviceWorker' in navigator) {
          //    try {
       //       await navigator.serviceWorker.register('../sw.js');
       //       } catch (e) {
       //       console.log(`SW registration failed`);
       //       }
      //    }
    //  }          

      $(document).ready(function(){        
        var mobile = document.getElementById("mobile");
        var desktop = document.getElementById("desktop");
        var home = document.getElementById("Home");
        
          if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            mobile.style.display = "block";
            desktop.style.display = "none";
            mobile.style.display = "block";    

            load_provider_data();
            function load_provider_data(query)
            {
              $.ajax({
                url:"./fetch/provider_fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                  $('#provider_info').html(data);
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

      function scannedTransfer(){
          var UUID = ScannedUUID;
          console.log("Working, Scanned: " + UUID)
          //alert(UUID);
          //load_user_data();
          //function load_user_data(query)
          //{
            //var UUID = $("UUID").val;
            $.ajax({
              url:"./fetch/popup_user.php",
              method:"post",
              data:{
                //query:query,
                UUID:UUID
              },
              success:function(data)
              {
                $('#user_popup').html(data);
              }
            });
          //} 
      }

      function scanAgain() {
        document.getElementById("webcamimg").disabled = false;
        $('#user_popup > div').remove();
        document.getElementById("webcamimg").innerText = 'SCAN QR';
      }
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


      <!-- default --> 
      <div id="Default" style="display: block;" class="tabcontent">   
        <div class="container" style="padding: 0px 0px 0px 0px !important">
            <!-- provider header -->
            <div class="pcontainer" id="provider_info">               
            </div> 

             <!-- download pwa -->      
            <div class="add-to" style="background-color: #1965FF; color: white; font-size: 10px; display: flex;align-items: center; justify-content: center; padding: 8px 0px 8px 0px;">
              <center>    
                  <button class="add-to-btn"><i class="fas fa-download"></i>&nbsp; Install Application on your Mobile Device</button>
              </center>
			      </div> 

            <!-- camera -->
            <div style="background-color: black; width: 100%; height: 400px;">    
                <div id="mainbody">
                  <div id="outdiv"></div>
                  <div style="visibility: hidden;" id="result"></div>
                  <input type="text" id="UUID" name="UUID" style="visibility: hidden;" >
                </div>
            </div>                       
            </div>      
            <!-- scan button -->
            <button class="scan-btn" class="selector" id="webcamimg"  onclick="setwebcam()" >SCAN QR</button>


            <!-- start popup -->
            <!-- profile -->
            <div id="user_popup">

            </div> 
            <!-- end popup -->



            <!-- still no idea -->   
            <div style="display: none !important;" class="xcontainer">
              <button class="scan-btn" class="selector" id="qrimg" onclick="setimg()">ATTACH QR IMAGE</button>
            </div>                 
        </div>          
      </div>

      <!-- home --> 
      <div id="Scanner" class="tabcontent">
        <div class="container">
        </div>      
      </div>

      <!-- qr -->
      <div id="Activity" class="tabcontent">
        <div class="container">
    
        </div>      
      </div>

      <!-- user menu -->
      <div class="menu">
        <div class="tab">
          <div class="row">
            <div class="col">
              <button class="tablinks active" onclick="openCity(event, 'Scanner')"><i class="fas fa-qrcode"></i><br/><span style="font-size: 7px">SCANNER</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="openCity(event, 'Activity')"><i class="fas fa-list"></i><br/><span style="font-size: 7px">ACTIVITY</span></button>
            </div>
            <div class="col">
              <button class="tablinks" onclick="window.location.href='./logout'"><i class="fas fa-sign-out-alt"></i><br/><span style="font-size: 7px">LOGOUT</span></button>
            </div>
          </div>                  
          
        </div>
      </div>

    </div>    
    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <script src='https://webqr.com/llqrcode.js'></script>
    <script  src="./assets/js/script.js"></script>
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
    header("Location: /scanner/login");
  }
?>
