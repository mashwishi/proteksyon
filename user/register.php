<?php 
  session_start();
  if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_email'])) { 
    $hcaptcha_sitekey = 'aaeec26b-2021-48e7-abd5-00c294ecfccd';
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
    <!-- Site Title  -->
    <title>Proteksyon | User Register</title>
    <link rel="stylesheet" href="./assets/css/user_register.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      window.addEventListener('load', () => {

          $(function(){
            var dtToday = new Date();
        
            var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
            var day = dtToday.getDate();
            var year = dtToday.getFullYear() - 10;
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
          var minDate = year + '-' + month + '-' + day;
            var maxDate = year + '-' + month + '-' + day;
          $('#bday').attr('max', maxDate);
          });

          $("input[type='date']").keydown(function (event) { event.preventDefault(); });

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

    <form action="createAccount.php" method="post" enctype="multipart/form-data">
    <h1>Create Account</h1>
      <fieldset>
          <!-- One "tab" for each step in the form: -->

          <!-- 1 First, Mid, Last name: -->
          <div class="tab">
              First Name:
              <p><input placeholder="First name" oninput="this.className = ''" name="fname" type="text"></p>
              Middle Name:
              <p><input placeholder="Middle name" oninput="this.className = ''" name="mname" type="text"></p>
              Last Name:
              <p><input placeholder="Last name" oninput="this.className = ''" name="lname" type="text"></p>

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
          </div>
          <!-- 2 Email and Contact -->
          <div class="tab">
              Email:
              <p><input id="email" placeholder="example@mail.com" onkeyup="validateEmail()" name="email" type="email"></p>
              Mobile No.::
              <p>
              <input type="number" id="phone" name="phone" class="phone"
              placeholder="09XXXXXXXXX" pattern="[0-9]{11}" 
              ng-model="number" onKeyPress="if(this.value.length==11) return false;" min="11"      
              oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" 
              oninput="this.className = ''" >
            </p>          
          </div>
          <!-- 3 Birthday and gender -->
          <div class="tab">Birthday:
              <p>
                <input oninput="this.className = ''" name="birthday" type="date" id="bday">
              </p>
              Gender:
              <p>
                <select name="gender" id='gender' onclick="this.className = ''">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>  
              </p>            
          </div>
          <!-- 4 Country, city, zipcode, address -->
          <div class="tab">
              Country:
              <p>            
                <select name="country" id='country' onclick="this.className = ''">
                  <option value="Philippines">Philippines</option>
                </select>    
              </p>  
              City:
              <p><input placeholder="City" oninput="this.className = ''" name="city" type="text"></p>     
              Zipcode:
              <p><input placeholder="Zip Code" oninput="this.className = ''" name="zipcode" type="text"></p>   
              Address:
              <p><input placeholder="Address" oninput="this.className = ''" name="address" type="text"></p>                       
          </div>  
          <!-- 5 vaccine & dose -->
          <div class="tab">
              Vaccine:
              <p>
                <select name="vaccine" id='vaccine' onclick="this.className = ''">
                    <option value="BioNTech, Pfizer">BioNTech, Pfizer</option>
					<option value="Sinovac-CoronaVac">Sinovac-CoronaVac</option>   
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson </option>
                    <option value="Sputnik V ">Sputnik V </option>
                    <option value="Sputnik Light">Sputnik Light</option>
                    <option value="Sinopham BBIBP">Sinopham BBIBP</option>
                    <option value="Oxford, Astraženeca">Oxford, Astraženeca</option>
                    <option value="Novavax ">Novavax</option>       
                    <option value="Covaxin ">Covaxin</option>                                                                                                                                                                             
                </select>  
              </p>
              Dose:
              <p>
                <select name="dose" id='dose' onclick="this.className = ''">
                  <option value="First Dose">First Dose</option>
                  <option value="Second Dose">Second Dose</option>
                  <option value="Booster Dose">Booster Dose</option>
                </select>  
              </p>            
          </div>   
          <!-- 6 vaccine card front -->       
          <div class="tab">       
              <div class="file-upload">
                Vaccination Card (Front):  
                <button class="file-upload-btn" type="button" onclick="$('.frontfile-upload-input').trigger( 'click' )">Select Picture</button>
                <p style="font-size: 10px;">Please upload a decent photo, This will go under verification.
                <br/>Supported Format: PNG, JPG, JPEG, GIF
                <br/>Max Upload Size: 10.00MB
                </p>  
                <div class="frontimage-upload-wrap">
                        <input id='front_card' class="frontfile-upload-input" type='file' name="card_front" onchange="frontreadURL(this);"  accept=".png, .jpg, .jpeg" />
                      <div class="frontdrag-text">
                          <h3>Upload Vaccination Card (Front)</h3>
                      </div>
                  </div>
                  <div class="frontfile-upload-content">
                        <img class="frontfile-upload-image" src="#" alt="your image" />
                            <div class="frontimage-title-wrap">
                                <button type="button" onclick="frontremoveUpload()" class="remove-image"><i class="fas fa-trash-alt"></i></button>
                            <br/>
                            </div>
                  </div>
            </div>              
          </div>   
          <!-- 7 vaccine card back -->       
          <div class="tab">       
              <div class="file-upload">
                Vaccination Card (Back):  
                <button class="file-upload-btn" type="button" onclick="$('.backfile-upload-input').trigger( 'click' )">Select Picture</button>
                <p style="font-size: 10px;">
                Please upload a decent photo, This will go under verification.
                <br/>Supported Format: PNG, JPG, JPEG, GIF
                <br/>Max Upload Size: 10.00MB
                </p>  
                <div class="backimage-upload-wrap">
                        <input id='back_card' class="backfile-upload-input" type='file' name="card_back" onchange="backreadURL(this);" accept=".png, .jpg, .jpeg" />
                      <div class="drag-text">
                          <h3>Upload Vaccination Card (Back)</h3>
                      </div>
                  </div>
                  <div class="backfile-upload-content">
                        <img class="backfile-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="backremoveUpload()" class="remove-image"><i class="fas fa-trash-alt"></i></button>
                            <br/>
                            </div>
                  </div>
            </div>              
          </div>             
          <!-- 8 avatar/profile picture -->       
          <div class="tab">
            <div class="file-upload">
                Profile Picture:
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Select Picture</button>
                <p style="font-size: 10px;">Please upload a decent photo, This will go under verification.
                <br/>Supported Format: PNG, JPG, JPEG, GIF
                <br/>Max Upload Size: 10.00MB
                </p>   
                <div class="image-upload-wrap">
                        <input id='avatar' class="file-upload-input" type='file' name="avatar" onchange="readURL(this);" accept=".png, .jpg, .jpeg" />
                      <div class="drag-text">
                          <h3>Upload a Photo</h3>
                      </div>
                  </div>
                  <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image"><i class="fas fa-trash-alt"></i></button>
                            <br/>
                            </div>
                  </div>
                  <script src="./assets/js/add_photo.js"></script>
            </div>                        
          </div>                            
          <!-- 9 password -->       
          <div class="tab">
              Password:         
              <p><input placeholder="Password" oninput="this.className = ''" name="pword" type="password"></p>
              <p><input placeholder="Confirm Password" oninput="this.className = ''" name="cpword" type="password"></p>              
          </div>
          <!-- 10 Captcha -->       
          <div class="tab">  
              <p style="font-size: 15px !important;">Solving Re-Captcha means you agree to our <a href="/terms-and-condition" style="color: #4B6691; font-size: 15px !important;" target="_blank">Terms</a> and <a style="color: #4B6691; font-size: 15px !important;" href="/privacy-policy" target="_blank">Policy</a>.</p>                   
              <p>
              <div style="margin-top: 3%;" class="h-captcha" data-sitekey="<?php echo $hcaptcha_sitekey ?>"></div>
              <p style="font-size: 10px !important;">
              Make sure to solve captcha correctly or the register process will reset.
              This site is protected by <a href="https://hCaptcha.com/?r=aebb987153ce" style="color: #4B6691; font-size: 10px !important;" target="_blank">hCaptcha</a> to avoid spam and bot registration.
              </p>                   
              <p><input class="submit" style="margin-top: 3%;" type="submit" name="register" value="Register"></p>
              </p>
          </div>          
          <div style="overflow:auto;">
              <div style="float:right;">
              <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class='fas fa-arrow-left'></i></button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fas fa-arrow-right"></i></button>
              </div>
          </div>        
          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>          
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>                                                                                                                
          </div>
      </fieldset>  
    </form>


    <div style="display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px 0px 8px 0px;"> 
    <p>Have an account? <a href="/user/login">Login Account</a>.</p> 
    </div> 

  
  </div>



  <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
  <script src="./assets/js/user_register.js"></script>
  </body>
</html>
<?php 
}else {
   header("Location: /user");
}
 ?>
