<?php 
  session_start();

  require_once '../db_conn.php';

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {     
  $user_id = $_SESSION['user_id'];
  $user_uuid = $_SESSION['user_uuid'];
  $user_avatar =  $_SESSION['user_avatar'];
?>
<!D
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
    <title>Proteksyon | User </title>
    <link rel="stylesheet" href="./assets/css/user.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script> 
    <script type="text/javascript">
      window.onload = function () {
          var qrcode = new QRCode(document.getElementById("qrcode"), {
              width: 200,
              height: 200,
              colorDark : "#80A6FF",
              colorLight : "#ffffff",
          });

          function makeCode() {
              var elText = '<?php echo $user_uuid; ?>';
              console.log("Calculare QR");
              qrcode.makeCode(elText);
          }
          makeCode();
      };
    </script>        
  </head>
  <body>
    <div id="qrcode"></div>
    <?php echo $user_id; ?>
    <?php echo $user_uuid; ?>

      <nav class="amazing-tabs">
      <div class="filters-container">
        <div class="filters-wrapper">
          <ul class="filter-tabs">
            <li>
              <button class="filter-button filter-active" data-translate-value="0">
                Profile
              </button>
            </li>
            <li>
              <button class="filter-button" data-translate-value="100%">
                Vaccination
              </button>
            </li>
            <li>
              <button class="filter-button" data-translate-value="200%">
                <a class="logout-btn" href="/user/logout">Logout</a>
              </button>
            </li>
          </ul>
          <div class="filter-slider" aria-hidden="true">
            <div class="filter-slider-rect">&nbsp;</div>
          </div>
        </div>
      </div>
      <div class="main-tabs-container">
        <div class="main-tabs-wrapper">
          <ul class="main-tabs">
            <li>
              <button class="round-button" data-translate-value="0" data-color="red">
                <span class="avatar">
                  <?php echo '<img src="data:image/png;base64,'.base64_encode($user_avatar).'"/>' ?>                  
                </span>
              </button>
            </li>
            <li>
              <button class="round-button active gallery" style="--round-button-active-color: #ff6d00" data-translate-value="400%" data-color="orange">
              <i style="z-index: -1;" class="fas fa-cog fa-2x"></i>
              </button>
            </li>
            <li>
              <button class="round-button " style="--round-button-active-color: #00c853" data-translate-value="200%" data-color="green">
              <i style="z-index: -1;" class="fas fa-qrcode fa-2x"></i>
              </button>
            </li>
            <li>
              <button class="round-button" style="--round-button-active-color: #2962ff" data-translate-value="100%" data-color="blue">
              <i style="z-index: -1;" class="fas fa-id-card fa-2x"></i>
              </button>              
            </li>
            <li>
              <button class="round-button" style="--round-button-active-color: #aa00ff" data-translate-value="300%" data-color="purple">
              <i style="z-index: -1;" class="far fa-map  fa-2x"></i>
              </button>
            </li>
          </ul>
          <div class="main-slider" aria-hidden="true">
            <div class="main-slider-circle">&nbsp;</div>
          </div>
        </div>
      </div>
    </nav>

    <script src="./assets/css/user_script.js"></script>

  </body>
</html>
<?php 
  }
  else{
    header("Location: /user/login");
  }
?>
