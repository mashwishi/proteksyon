<?php 
  session_start();
  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
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
    <!-- Site Title  -->
    <title>Proteksyon | User Login</title>
    <link rel="stylesheet" href="./assets/css/user_login.css">

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
  </head>
  <body>
  <div id="login">

    <img style="margin-bottom: 5%;" src="../images/logo-dark2x.png" alt="logo">

    <form action="authLogin.php" method="post">
    <h1>Login Account</h1>
      <fieldset>

        <p>
          <!--  value of input php: if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) -->
            <input 
                type="email" 
                required
                autocomplete="off"
                name="email" 
                placeholder="Email Address"
            >
        </p>

        <p>
            <input
                type="password" 
                required 
                autocomplete="off"
                name="password" 
                placeholder="Password"
            >
            <p><a href="/password-reset">Forgot Password?</a></p>
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

        <p><input style="margin-top: 3%;" type="submit" value="Login"></p>

      </fieldset>

    </form>

    <p>
        <a href="/scanner">
            <span class="map-before"><span class="fontawesome-map-marker"></span></span>
            <button class="map">Login as Scanner</button>
        </a>
    </p>


  </div>
  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  </body>
</html>
<?php 
}else {
   header("Location: /user");
}
 ?>
