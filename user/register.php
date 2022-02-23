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
    <title>Proteksyon | User Register</title>
    <link rel="stylesheet" href="./assets/css/user_register.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />    
    <style>
        img[alt*="www.000webhost.com"] { display: none!important; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
              Mobile No.:
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
                <input oninput="this.className = ''" name="birthday" type="date">
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
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Åland Islands">Åland Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="Brunei Darussalam">Brunei Darussalam</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote D'ivoire">Cote D'ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guernsey">Guernsey</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-bissau">Guinea-bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jersey">Jersey</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                  <option value="Korea, Republic of">Korea, Republic of</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macao">Macao</option>
                  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                  <option value="Moldova, Republic of">Moldova, Republic of</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Netherlands Antilles">Netherlands Antilles</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn">Pitcairn</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russian Federation">Russian Federation</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Saint Helena">Saint Helena</option>
                  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                  <option value="Saint Lucia">Saint Lucia</option>
                  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-leste">Timor-leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="United States">United States</option>
                  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Viet Nam">Viet Nam</option>
                  <option value="Virgin Islands, British">Virgin Islands, British</option>
                  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                  <option value="Wallis and Futuna">Wallis and Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
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
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson& Johnson </option>
                    <option value="Sputnik V ">Sputnik V </option>
                    <option value="Sputnik Light">Sputnik Light</option>
                    <option value="Sinopham BBIBP">Sinopham BBIBP</option>
                    <option value="Oxford, Astraženeca">Oxford, Astraženeca</option>
                    <option value="Novavax ">Novavax</option>
                    <option value="CoronaVac ">CoronaVac</option>          
                    <option value="Covaxin ">Covaxin</option>                                                                                                                                                                             
                </select>  
              </p>
              Dose:
              <p>
                <select name="dose" id='dose' onclick="this.className = ''">
                  <option value="Male">First Dose</option>
                  <option value="Female">Second Dose</option>
                  <option value="Female">Booster Dose</option>
                </select>  
              </p>            
          </div>   
          <!-- 6 vaccine card front -->       
          <div class="tab">       
              <div class="file-upload">
                Vaccination Card (Front):  
                <button class="file-upload-btn" type="button" onclick="$('.frontfile-upload-input').trigger( 'click' )">Select Picture</button>
                <p style="font-size: 10px;">Please upload a decent photo, This will go under verification.</p>  
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
                <p style="font-size: 10px;">Please upload a decent photo, This will go under verification.</p>  
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
                <p style="font-size: 10px;">Please upload a decent photo, This will go under verification.</p>   
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
              <p style="font-size: 15px !important;">Solving Re-Captcha means you agree to our <a href="/terms" style="color: #4B6691; font-size: 15px !important;" target="_blank">Terms</a> and <a style="color: #4B6691; font-size: 15px !important;" href="/policy" target="_blank">Policy</a>.</p>                   
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
