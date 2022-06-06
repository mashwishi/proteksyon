<?php 
  session_start();
  if (!isset($_SESSION['establishment_id']) && !isset($_SESSION['establishment_email'])) { 
    $hcaptcha_sitekey = 'aaeec26b-2021-48e7-abd5-00c294ecfccd';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="../images/favicon.png">
    <!-- Site Title  -->
    <title>Proteksyon | Scanner Login</title>
    <link rel="stylesheet" href="./assets/css/scanner_login.css">

    <script type="text/javascript">
      window.addEventListener('load', () => {
          registerSW();      
      });

      async function registerSW() {
          if ('serviceWorker' in navigator) {
              try {
              await navigator.serviceWorker.register('../sw.js');
              } catch (e) {
              console.log(`SW registration failed`);
              }
          }
      }     
    </script>
        <style>
                img[alt*="www.000webhost.com"] { display: none !important; }
        div.disclaimer{ display: none !important; }
    </style>
  </head>
  
  <body>
  <div id="login">

    <img style="margin-bottom: 5%;" src="../images/logo-dark2x.png" alt="logo">

    <form action="authScanner.php" method="post">
    <h1>Scanner Account</h1>
      <fieldset>

        <p>
          <!--  value of input php: if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) -->
            <input 
                type="email" 
                required
                autocomplete="off"
                name="scanner_email" 
                placeholder="Email Address"
            >
        </p>

        <p>
            <input
                type="password" 
                required 
                autocomplete="off"
                name="scanner_password" 
                placeholder="Password"
            >
            <!--<p><a href="/password-reset">Forgot Password?</a></p>-->
        </p>

        <h2 class="input-placeholder" id="email-txt">
            <span id="email-error" style="color: #F86168; font-size: 12px">       
                    <?php if (isset($_GET['error-email'])) { ?>
                    <?=htmlspecialchars($_GET['error-email'])?>
                    <?php } ?>
            </span>              
        </h2>

        <div style="margin-top: 3%;" class="h-captcha" data-sitekey="<?php echo $hcaptcha_sitekey ?>"></div>

        <span class="error-message" id="email-captcha" style="color: #F86168; font-size: 12px">
                        <?php if (isset($_GET['error-captcha'])) { ?>
                        <?=htmlspecialchars($_GET['error-captcha'])?>
                        <?php } ?>
        </span>

        <span style="color: #F86168; font-size: 12px">
                        <?php if (isset($_GET['error'])) { ?>
                        <?=htmlspecialchars($_GET['error'])?>
                        <?php } ?>
              </span>   

              <span style="color: #00C122; font-size: 12px">
                        <?php if (isset($_GET['success'])) { ?>
                        <?=htmlspecialchars($_GET['success'])?>
                        <?php } ?>
              </span>   
        <p><input style="margin-top: 3%;" type="submit" value="Login"></p>

      </fieldset>

    </form>

    <p>
        <a href="/establishment">
            <i class="fas fa-shield-virus map-before"></i>
            <button class="map">Login as Establishment</button>
        </a>
    </p>
    <p>
        <a href="/user">
            <i class="fas fa-user map-before"></i>
            <button class="map">Login as User</button>
        </a>
    </p>


  </div>
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  </body>
</html>
<?php 
}else {
   header("Location: /scanner");
}
 ?>
