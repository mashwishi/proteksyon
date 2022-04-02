<html lang="zxx" class="js">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">

    <link rel="manifest" href="./manifest.json">
    <!-- ios support -->
    <link rel="apple-touch-icon" href="/assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" href="/assets/images/icons/icon-256x256.png">
    <link rel="apple-touch-icon" href="/assets/images/icons/icon-384x384.png">
    <link rel="apple-touch-icon" href="/assets/images/icons/icon-512x512.png">

    <link href="/assets/images/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/assets/images/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

    <meta name="apple-mobile-web-app-status-bar" content="#db4938">
    <meta name="theme-color" content="#db4938">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Site Title  -->
    <title>Proteksyon | Virtual Vaccination ID & Contact Tracing</title>
    <!-- Bundle and Base CSS -->
    <link rel="stylesheet" href="assets/css/bundle.css?ver=112">
    <link rel="stylesheet" href="assets/css/styles-azure.css?ver=112">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
      integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
      crossorigin="anonymous"
    />
    <script>

    deviceCheck();

    function deviceCheck() {
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
        {  
                window.location.href = '/user';
        }
        else     
        {
            window.addEventListener('load', () => {
                registerSW();      
            });   
        }  
    }             
    
    async function registerSW() {
        if ('serviceWorker' in navigator) {
            try {
            await navigator.serviceWorker.register('./sw.js');
            } catch (e) {
            console.log(`SW registration failed`);
            }
        }
    }     
    </script>    
</head>

<body class="nk-body nk-body-alt">

    <div class="nk-wrap">
        <header class="nk-header bg-light-grad-a has-overlay" id="home">
            <div class="overlay shape shape-line-a"></div><!-- Overlay Shape -->
            <div class="nk-navbar is-light is-sticky" id="navbar">
                <div class="container">
                    <div class="nk-navbar-wrap">
                        <div class="nk-navbar-logo logo">
                            <a href="./" class="logo-link">
                                <img class="logo-dark" src="images/logo-dark.png" srcset="images/logo-dark2x.png 2x" alt="logo">
                                <img class="logo-light" src="images/logo-white.png" srcset="images/logo-white2x.png 2x" alt="logo">
                            </a>
                        </div><!-- .nk-navbar-logo -->
                        <div class="nk-navbar-toggle d-lg-none">
                            <a href="#" class="toggle" data-menu-toggle="navbar-menu"><em class="icon-menu icon ni ni-menu"></em><em class="icon-close icon ni ni-cross"></em></a>
                        </div><!-- .nk-navbar-toggle -->
                        <nav class="nk-navbar-menu nk-navbar-menu-between" id="navbar-menu">
                            <ul class="nk-menu">
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#symptoms">Symptoms</a></li>
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#spread">Spread</a></li>
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#prevention">Prevention</a></li>
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#protect">Do &amp; Don't</a></li>
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#faq">FAQ</a></li>
                                <li class="nk-menu-item"><a class="scrollto nav-link nk-menu-link" href="#about">About Corona</a></li>
                            </ul>
                            <ul class="nk-menu-btns">
                                <li class="nk-menu-item"><a href="#" data-offcanvas-toggle="sidebar-info" class="btn btn-sm toggle-offcanvas">Account</a></li>
                            </ul>
                        </nav><!-- .nk-navbar-menu -->
                    </div><!-- .nk-navbar-wrap -->
                </div><!-- .container -->
            </div><!-- .nk-navbar -->
            <div class="nk-banner-s2">
                <div class="container">
                    <div class="row g-gs my-auto align-items-center justify-content-between">
                        <div class="col-lg-5 order-lg-last">
                            <div class="nk-banner-s2-image">
                                <img src="images/gfx/header-b.png" alt="">
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-7">
                            <div class="nk-banner-s2-block pr-xl-5">
                                <div class="content">
                                    <h6 class="sub-title"><span class="badge badge-danger">Covid-19</span> <span>Coronavirus</span></h6>
                                    <h1 class="title">Virtual Vaccination ID  <br class="d-none d-sm-block">and Contact Tracing</h1>
                                    <p>The best way to prevent and slow down transmission is be well informed 
                                        about the COVID-19 virus. Protect yourself and others from infection by 
                                        washing your hands at-least 20sec and not touching your face. </p>
    
                                    <ul class="nk-banner-btns">
                                        <li><a href="#protect" class="btn scrollto"><span><i class="fab fa-android"></i>&nbsp; Download Application</span></a></li>
                                        <li><a href="#about" class="btn btn-transparent scrollto"><span><i class="fas fa-qrcode"></i>&nbsp; Scanner for Provider</span><em class="icon ni ni-arrow-right"></em></a></li>
                                    </ul>
                                </div><!-- .content -->
                            </div><!-- .nk-banner-block -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                    <div class="status">
                        <div class="row g-gs">
                            <div class="col-lg-6 col-xl-5" data-covid="world" data-covid-update="last-update">
                                <h6 class="status-title">Worldwide Statistics</h6>
                                <div class="row g-gs pr-4">
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-cases">~</div>
                                            <h6 class="title text-purple">Confirmed</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-death">~</div>
                                            <h6 class="title text-danger">Deaths</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-recovered">~</div>
                                            <h6 class="title text-success">Recovered Today</h6>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xl-5" data-covid="PH">
                                <h6 class="status-title">In Philippines</h6>
                                <div class="row g-gs pr-4">
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-cases">~</div>
                                            <h6 class="title text-purple">Confirmed</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-death">~</div>
                                            <h6 class="title text-danger">Deaths</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <div class="status-item">
                                            <div class="h4 count covid-stats-recovered">~</div>
                                            <h6 class="title text-success">Recovered Today</h6>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                        <div class="status-note">* Last updated: 
                            <span id="last-update" class="update-time">~</span>
                        </div>
                    </div><!-- .status -->
                </div><!-- .container -->
            </div><!-- .nk-banner -->
        </header><!-- .nk-header -->

        <main class="nk-pages">
            <section class="section section-l bg-white section-about" id="about">
                <div class="container">
                    <div class="section-content">
                        <div class="row g-gs justify-content-between align-items-center">
                            <div class="col-lg-6">
                                <div class="gfx1 mr-lg-5">
                                    <img src="images/gfx/gfx-a.png" alt="">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="text-block-s2">
                                    <h5 class="subtitle">About the disease</h5>
                                    <h2 class="title">Coronavirus <br class="d-sm-none">(COVID-19)</h2>
                                    <p class="lead"><strong>COVID-19 is a new illness that can affect your lungs and airways.</strong> It's caused by a virus called coronavirus. It was discovered in December 2019 in Wuhan, Hubei, China. </p>
                                    <p>Common signs of infection include respiratory symptoms, fever, cough, shortness of breath and breathing difficulties. In more severe cases, infection can cause pneumonia, severe acute respiratory syndrome, kidney failure and even death.</p>
                                    <p>Standard recommendations to prevent infection spread include regular hand washing, covering mouth and nose when coughing and sneezing, thoroughly cooking meat and eggs. Avoid close contact with anyone showing symptoms of respiratory illness such as coughing and sneezing.</p>
                                </div><!-- .text-block -->
                                <div class="fake-box">
                                    <h4 class="title mb-3">What you need to know</h4>
                                    <ul class="list row g-s">
                                        <li class="col-sm-6"><a class="scrollto link" href="#spread"><span>How coronavirus is spread</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                        <li class="col-sm-6"><a class="scrollto link" href="#symptoms"><span>Symptoms of coronavirus</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                        <li class="col-sm-6"><a class="scrollto link" href="#protect"><span>How to Prevent & Protect</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                        <li class="col-sm-6"><a class="scrollto link" href="#faq"><span>Questions & answers</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
                                    </ul>
                                </div><!-- .wgs -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-light section-spread pb-0 ov-h has-overlay" id="spread">
                <div class="overlay bg-white h-40 bottom"></div><!-- Overlay Shape -->
                <div class="container">
                    <div class="section-head-s2 text-center wide-md">
                        <h5 class="subtitle">How coronavirus is spread</h5>
                        <h2 class="title">Transmission of <br class="d-sm-none"> COVID-19</h2>
                        <p>Because it's a new illness, we do not know exactly how coronavirus spreads from person to person. Similar viruses are spread in cough droplets.</p>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs justify-content-center">
                            <div class="col-md-8 col-lg-4">
                                <div class="box box-alt">
                                    <div class="box-gfx">
                                        <img src="images/gfx/spread-azure-a.png" alt="">
                                    </div>
                                    <div class="box-content">
                                        <h4 class="title">Person-to-person spread as close contact with infected </h4>
                                        <p>The coronavirus is thought to spread mainly from person to person. This can happen between people who are in close contact with one another.</p>
                                    </div>
                                </div><!-- .box -->
                            </div><!-- .col -->
                            <div class="col-md-8 col-lg-4">
                                <div class="box box-alt">
                                    <div class="box-gfx">
                                        <img src="images/gfx/spread-azure-b.png" alt="">
                                    </div>
                                    <div class="box-content">
                                        <h4 class="title">Touching or contact with infected surfaces or objects</h4>
                                        <p>A person can get COVID-19 by touching a surface or object that has the virus on it and then touching their own mouth, nose, or possibly their eyes.</p>
                                    </div>
                                </div><!-- .box -->
                            </div><!-- .col -->
                            <div class="col-md-8 col-lg-4">
                                <div class="box box-alt">
                                    <div class="box-gfx">
                                        <img src="images/gfx/spread-azure-c.png" alt="">
                                    </div>
                                    <div class="box-content">
                                        <h4 class="title">Droplets that from infected person coughs or sneezes</h4>
                                        <p>The coronavirus is thought to spread mainly from person to person. This can happen between people who are in close contact with one another.</p>
                                    </div>
                                </div><!-- .box -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                        <ul class="section-actions">
                            <li><a href="#faq" class="btn scrollto"><em class="icon ni ni-question"></em><span>Have question about spreading?</span></a></li>
                        </ul><!-- .section-actions -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-white section-symptoms" id="symptoms">
                <div class="container">
                    <div class="section-head-s2 section-head-s2-sm">
                        <h5 class="subtitle">What are the symptoms of COVID-19?</h5>
                        <h2 class="title">Symptoms of Coronavirus</h2>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs align-items-center">
                            <div class="col-lg-6 order-lg-last">
                                <div class="gfx2">
                                    <img src="images/gfx/gfx-b.png" alt="">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="text-block-s2">
                                    <p>The most common symptoms of COVID-19 are fever, tiredness, and dry cough. Some patients may have aches and pains, nasal congestion, runny nose, sore throat or diarrhea. These symptoms are usually mild and begin gradually. Also the symptoms may appear 2-14 days after exposure.</p>
                                </div><!-- .section-head -->
                                <div class="row g-gs justify-content-center">
                                    <div class="col-12">
                                        <div class="box8">
                                            <div class="box8-gfx">
                                                <img src="images/gfx/symptom-a.png" alt="">
                                            </div>
                                            <div class="box8-content">
                                                <p><strong>High Fever</strong> – this means you feel hot to touch on your chest or back (you do not need to measure your temperature). It is a common sign and also may appear in 2-10 days if you affected.</p>
                                            </div>
                                        </div><!-- .box8 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box8">
                                            <div class="box8-gfx">
                                                <img src="images/gfx/symptom-b.png" alt="">
                                            </div>
                                            <div class="box8-content">
                                                <p><strong>Continuous cough</strong> – this means coughing a lot for more than an hour, or 3 or more coughing episodes in 24 hours (if you usually have a cough, it may be worse than usual).</p>
                                            </div>
                                        </div><!-- .box8 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box8">
                                            <div class="box8-gfx">
                                                <img src="images/gfx/symptom-c.png" alt="">
                                            </div>
                                            <div class="box8-content">
                                                <p><strong>Difficulty breathing</strong> – Around 1 out of every 6 people who gets COVID-19 becomes seriously ill and develops difficulty breathing or shortness of breath.</p>
                                            </div>
                                        </div><!-- .box8 -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                    

                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-light section-advice has-overlay" id="prevention">
                <div class="overlay shape shape-e"></div><!-- Overlay Shape -->
                <div class="container">
                    <div class="section-content">
                        <div class="row g-gs align-items-center">
                            <div class="col-lg-5">
                                <div class="gfx3">
                                    <img src="images/gfx/gfx-c.png" alt="">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-7">
                                <div class="section-head-s2">
                                    <h5 class="subtitle">How to Protect Yourself?</h5>
                                    <h2 class="title">Prevention &amp; Advice</h2>
                                    <p>There is currently no vaccine to prevent Coronavirus (COVID-19. <strong>The best way to prevent illness is to avoid being exposed to this virus.</strong></p>
                                </div><!-- .section-head -->
                                <div class="row g-gs justify-content-center">
                                    <div class="col-12">
                                        <div class="box7">
                                            <div class="box7-gfx">
                                                <img src="images/gfx/advice-a.png" alt="">
                                            </div>
                                            <div class="box7-content">
                                                <h6 class="title">Soap on Hand</h6>
                                                <P>Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water for at least 20 seconds.</P>
                                            </div>
                                        </div><!-- .box7 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box7">
                                            <div class="box7-gfx">
                                                <img src="images/gfx/advice-b.png" alt="">
                                            </div>
                                            <div class="box7-content">
                                                <h6 class="title">Maintain social distancing</h6>
                                                <P>Maintain at least 1 metre (3 feet) distance between yourself & anyone who is coughing or sneezing. If you are too close, get chance to infected.</P>
                                            </div>
                                        </div><!-- .box7 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box7">
                                            <div class="box7-gfx">
                                                <img src="images/gfx/advice-c.png" alt="">
                                            </div>
                                            <div class="box7-content">
                                                <h6 class="title">Avoid touching face</h6>
                                                <P>Hands touch many surfaces and can pick up viruses. So, hands can transfer the virus to your eyes, nose or mouth and can make you sick.</P>
                                            </div>
                                        </div><!-- .box7 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box7">
                                            <div class="box7-gfx">
                                                <img src="images/gfx/advice-d.png" alt="">
                                            </div>
                                            <div class="box7-content">
                                                <h6 class="title">Practice respiratory hygiene</h6>
                                                <P>Maintain good respiratory hygiene as covering your mouth & nose with your bent elbow or tissue when cough or sneeze.</P>
                                            </div>
                                        </div><!-- .box7 -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                                <ul class="section-actions justify-content-start">
                                    <li><a href="#handwash" class="btn scrollto"><span>Check how you wash hand</span><em class="icon ni ni-arrow-long-right"></em></a></li>
                                    <li><a href="#faq" class="btn btn-transparent scrollto"><span>Q&A on Coronaviruses</span><em class="icon ni ni-arrow-long-right"></em></a></li>
                                </ul><!-- .section-actions -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-white section-steps" id="steps">
                <div class="container">
                    <div class="section-content">
                        <div class="row g-gs align-items-center justify-content-between">
                            <div class="col-lg-7 col-xl-6 pr-lg-4 pr-xl-0">
                                <div class="section-head-s2">
                                    <h5 class="subtitle">Be Carefull &amp; Stay Safe</h5>
                                    <h2 class="title">Take steps to protect others</h2>
                                </div><!-- .section-head -->
                                <ul class="list-check">
                                    <li><strong>Stay home if you’re sick</strong> – Stay home if you are sick, except to get medical care.</li>
                                    <li><strong>Cover your mouth and nose</strong> – with a tissue when you cough or sneeze (throw used tissues in the trash) or use the inside of your elbow.</li>
                                    <li><strong>Wear a facemask if you are sick</strong> – You should wear a facemask when you are around other people (e.g., sharing a room or vehicle) and before you enter a healthcare provider’s </li>
                                    <li><strong>Clean AND disinfect frequently touched surfaces daily</strong> – This includes phones,  tables, light switches, doorknobs, countertops, handles, desks, toilets, faucets, and sinks.</li>
                                    <li><strong>Clean the dirty surfaces</strong> – Use detergent or soap and water prior to disinfection.</li>
                                    <li><strong>Stay informed about the local COVID-19 situation</strong> – Get up-to-date information about local COVID-19 activity from <a href="#">public health officials.</a></li>
                                    <li><strong>Dedicated, lined trash can</strong> – If possible, dedicate a lined trash can for the ill person. Use gloves when removing garbage bags, and handling & disposing of trash.</li>
                                </ul>
                            </div>
                            <div class="col-lg-5">
                                <div class="box5 box5-alt bg-light">
                                    <h4 class="title">Treatment for Coronavirus</h4>
                                    <p><strong>To date, there is no vaccine and no specific antiviral medicine to prevent or treat COVID-2019.</strong> However, those affected should receive care to relieve symptoms and most patients recover thanks to supportive care</p>
                                    <h6 class="title">Self Care</h6>
                                    <p>If you have mild symptoms, stay at home until you’ve recovered. You can relieve your symptoms if you:</p>
                                    <ul class="list-arrow">
                                        <li>Rest and sleep</li>
                                        <li>Keep warm</li>
                                        <li>Drink plenty of liquids</li>
                                        <li>Use a room humidifier or take a hot shower to help ease a sore throat and cough</li>
                                    </ul>
                                    <h6 class="title">Medical Treatments</h6>
                                    <p>If you develop a fever, cough, and have difficulty breathing, promptly seek medical care. Call in advance and tell your health provider of any recent travel or recent contact with travelers.</p>
                                </div><!-- .box5 -->
                            </div>
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-light section-handwash pb-0 ov-h" id="handwash">
                <div class="container">
                    <div class="section-content">
                        <div class="row g-gs justify-content-between">
                            <div class="col-lg-5 align-self-end order-lg-last">
                                <div class="gfx4">
                                    <img src="images/gfx/gfx-d.png" alt="">
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="section-head-s2 text-center text-lg-left">
                                    <h5 class="subtitle">Wash  Your Hands Frequently</h5>
                                    <h3 class="title">Protect yourself, wash your hands</h3>
                                    <p>Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water as it kills viruses that may be on your hands.</p>
                                </div><!-- .section-head -->
                                <div class="row g-gs justify-content-center ml-lg-n5 pl-lg-3 pl-xl-2">
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-a.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Soap on Hand</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-b.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Palm to Palm</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-c.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Between Fingers</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-d.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Back to Hands</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-e.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Clean with Water</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                    <div class="col-6 col-mb-5 col-sm-4">
                                        <div class="box4 box4-alt">
                                            <div class="box4-gfx">
                                                <img src="images/gfx/hand-f.png" alt="">
                                            </div>
                                            <div class="box4-content">
                                                <h6 class="title">Focus on Wrist</h6>
                                            </div>
                                        </div><!-- .box4 -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                                <ul class="section-actions justify-content-lg-start">
                                    <li><a href="https://www.youtube.com/watch?v=Clf98j97uRs" target="_blank" class="btn"><span>Watch in Video</span><em class="icon ni ni-play-circle-fill"></em></a></li>
                                </ul>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-light section-protect has-overlay" id="protect">
                <div class="overlay shape shape-d"></div><!-- Overlay Shape -->
                <div class="container">
                    <div class="section-head-s2 text-center wide-lg">
                        <h5 class="subtitle">Do’s &amp; Don’ts</h5>
                        <h2 class="title">Protect yourself</h2>
                        <p>The best thing you can do now is plan for how you can adapt your daily routine. Take few steps to protect yourself as Clean your hands often, Avoid close contact, Cover coughs and sneezes, clean daily used surfaces etc. The best way to prevent illness is to avoid being exposed to this virus.</p>
                    </div><!-- .section-head -->
                    <div class="section-content px-lg-5 mx-lg-4">
                        <div class="row g-gs gx-m justify-content-center">
                            <div class="col-lg-6">
                                <div class="row g-gs">
                                    <div class="col-12">
                                        <div class="box6 positive">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/dos-a.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Wash Your Hands</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box6 positive">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/dos-b.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Drink Much Watar</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box6 positive">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/dos-c.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Use Face Mask</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                            <div class="col-lg-6">
                                <div class="row g-gs">
                                    <div class="col-12">
                                        <div class="box6 negative">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/donts-a.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Avoid Close Contact</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box6 negative">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/donts-b.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Don’t Touch Face</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                    <div class="col-12">
                                        <div class="box6 negative">
                                            <div class="box6-gfx">
                                                <img src="images/gfx/donts-c.png" alt="">
                                            </div>
                                            <div class="box6-text">
                                                <h6 class="title">Social Distancing</h6>
                                                <p>The best thing you can do now is plan for how.</p>
                                            </div>
                                        </div><!-- .box6 -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-l bg-white section-faq" id="faq">
                <div class="container">
                    <div class="section-head-s2">
                        <h5 class="subtitle">Frequently Asked Questions</h5>
                        <h2 class="title">Your Question Answered</h2>
                    </div><!-- .section-head -->
                    <div class="section-content">
                        <div class="row g-gs">
                            <div class="col-lg-4">
                                <ul class="nav nav-tabs nav-tabs-vr nav-tabs-line">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#covid-basics">Coronavirus Basics</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#covid-spreads">How It Spreads</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#covid-protect">How to Protect Yourself</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#covid-symptoms">Symptoms &amp; Testing</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#covid-outbreak">Outbreak in Your Community</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#covid-myth">Myth-Busters of coronavirus</a>
                                    </li>
                                </ul><!-- .nav-tabs -->
                            </div><!-- .col -->
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="covid-basics">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title" data-toggle="collapse" data-target="#covid-basics-01">What is a novel coronavirus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-basics-01" class="collapse show">
                                                    <div class="accordion-content">
                                                        <p>On February 11, 2020 the World Health Organization announced an official name for the disease that is causing the 2019 novel coronavirus outbreak, first identified in Wuhan China. The new name of this disease is coronavirus disease 2019, abbreviated as COVID-19. In COVID-19, ‘CO’ stands for ‘corona,’ ‘VI’ for ‘virus,’ and ‘D’ for disease. Formerly, this disease was referred to as “2019 novel coronavirus” or “2019-nCoV”.</p>
                                                        <p>A novel coronavirus is a new coronavirus that has not been previously identified. The virus causing coronavirus disease 2019 (COVID-19), is not the same as the <a href="https://www.cdc.gov/coronavirus/2019-ncov/index.html" target="_blank">coronaviruses that commonly circulate among humans</a> and cause mild illness, like the common cold.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-basics-02">Why is the disease being called coronavirus disease 2019, COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-basics-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>On February 11, 2020 the World Health Organization announced an official name for the disease that is causing the 2019 novel coronavirus outbreak, first identified in Wuhan China. The new name of this disease is coronavirus disease 2019, abbreviated as COVID-19. In COVID-19, ‘CO’ stands for ‘corona,’ ‘VI’ for ‘virus,’ and ‘D’ for disease. Formerly, this disease was referred to as “2019 novel coronavirus” or “2019-nCoV”.</p>
                                                        <p>There are <a href="https://www.cdc.gov/coronavirus/2019-ncov/index.html" target="_blank">many types</a> of human coronaviruses including some that commonly cause mild upper-respiratory tract illnesses. COVID-19 is a new disease, caused be a novel (or new) coronavirus that has not previously been seen in humans. The name of this disease was selected following the World Health Organization (WHO) best practiceexternal icon for naming of new human infectious diseases.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-basics-03">How can people help stop stigma related to COVID-19? <span class="accordion-icon"></span></h5>
                                                <div id="covid-basics-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>People can fight stigma and help, not hurt, others by providing social support. Counter stigma by learning and sharing facts. Communicating the facts that viruses do not target specific racial or ethnic groups and how COVID-19 actually spreads can help stop stigma.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-basics-04">Why might someone blame or avoid individuals and groups? <span class="accordion-icon"></span></h5>
                                                <div id="covid-basics-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>People in the U.S. may be worried or anxious about friends and relatives who are living in or visiting areas where COVID-19 is spreading. Some people are worried about the disease. Fear and anxiety can lead to social stigma, for example, towards Chinese or other Asian Americans or people who were in quarantine.</p>
                                                        <p>Stigma is discrimination against an identifiable group of people, a place, or a nation. Stigma is associated with a lack of knowledge about how COVID-19 spreads, a need to blame someone, fears about disease and death, and gossip that spreads rumors and myths.</p>
                                                        <p>Stigma hurts everyone by creating more fear or anger towards ordinary people instead of the disease that is causing the problem.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="covid-spreads">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-01">What is the source of the virus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-01" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Coronaviruses are a large family of viruses. Some cause illness in people, and others, such as canine and feline coronaviruses, only infect animals. Rarely, animal coronaviruses that infect animals have emerged to infect people and can spread between people. This is suspected to have occurred for the virus that causes COVID-19. Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory Syndrome (SARS) are two other examples of coronaviruses that originated from animals and then spread to people. More information about the source and spread of COVID-19 is available on the <a href="https://www.cdc.gov/coronavirus/2019-ncov/cases-updates/summary.html" target="_blank">Situation Summary: Source and Spread of the Virus</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-02">How does the virus spread?<span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>This virus was first detected in Wuhan City, Hubei Province, China. The first infections were linked to a live animal market, but the virus is now spreading from person-to-person. It’s important to note that person-to-person spread can happen on a continuum. Some viruses are highly contagious (like measles), while other viruses are less so.</p>
                                                        <p>The virus that causes COVID-19 seems to be spreading easily and sustainably in the community (“community spread”) in <a href="https://www.cdc.gov/coronavirus/2019-ncov/prepare/transmission.html" target="_blank">some affected geographic areas</a>. Community spread means people have been infected with the virus in an area, including some who are not sure how or where they became infected.</p><p>Learn what is known about the <a href="https://www.cdc.gov/coronavirus/2019-ncov/about/transmission.html" target="_blank">spread of newly emerged coronaviruses</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-03">Can someone who has had COVID-19 spread the illness to others? <span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>The virus that causes COVID-19 is <a href="https://www.cdc.gov/coronavirus/2019-ncov/prepare/transmission.html" target="_blank">spreading from person-to-person</a>. Someone who is actively sick with COVID-19 can spread the illness to others. That is why CDC recommends that these patients be isolated either in the hospital or at home (depending on how sick they are) until they are better and no longer pose a risk of infecting others.</p>
                                                        <p>How long someone is actively sick can vary so the decision on when to release someone from isolation is made on a case-by-case basis in consultation with doctors, infection prevention and control experts, and public health officials and involves considering specifics of each situation including disease severity, illness signs and symptoms, and results of laboratory testing for that patient.</p>
                                                        <p>Current <a href="https://www.cdc.gov/coronavirus/2019-ncov/hcp/disposition-hospitalized-patients.html" target="_blank">CDC guidance for when it is OK to release someone from isolation</a>&nbsp;is made on a case by case basis and includes meeting all of the following requirements:</p>
                                                        <ul>
                                                            <li>The patient is free from fever without the use of fever-reducing medications.</li>
                                                            <li>The patient is no longer showing symptoms, including cough.</li>
                                                            <li>The patient has tested negative on at least two consecutive respiratory specimens collected at least 24 hours apart.</li>
                                                        </ul>
                                                        <p>Someone who has been released from isolation is not considered to pose a risk of infection to others.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-04">Will warm weather stop the outbreak of COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>It is not yet known whether weather and temperature impact the spread of COVID-19. Some other viruses, like the common cold and flu, spread more during cold weather months but that does not mean it is impossible to become sick with these viruses during other months.  At this time, it is not known whether the spread of COVID-19 will decrease when weather becomes warmer.  There is much more to learn about the transmissibility, severity, and other features associated with COVID-19 and investigations are ongoing.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-05">Can the virus that causes COVID-19 be spread through food, including refrigerated or frozen food?<span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-05" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Coronaviruses are generally thought to be spread from person-to-person through respiratory droplets. Currently there is no evidence to support transmission of COVID-19 associated with food. Before preparing or eating food it is important to always wash your hands with soap and water for 20 seconds for general food safety. Throughout the day wash your hands after blowing your nose, coughing or sneezing, or going to the bathroom.</p>
                                                        <p>It may be possible that a person can get COVID-19 by touching a surface or object that has the virus on it and then touching their own mouth, nose, or possibly their eyes, but this is not thought to be the main way the virus spreads.</p>
                                                        <p>In general, because of poor survivability of these coronaviruses on surfaces, there is likely very low risk of spread from food products or packaging that are shipped over a period of days or weeks at ambient, refrigerated, or frozen temperatures.</p>
                                                        <p>Learn what is known about the <a href="https://www.cdc.gov/coronavirus/2019-ncov/prepare/transmission.html" target="_blank">spread of COVID-19</a>.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-spreads-06">What is community spread?<span class="accordion-icon"></span></h5>
                                                <div id="covid-spreads-06" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Community spread means people have been infected with the virus in an area, including some who are not sure how or where they became infected.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="covid-protect">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-protect-01">What can I do to protect myself and prevent the spread of disease?<span class="accordion-icon"></span></h5>
                                                <div id="covid-protect-01" class="collapse">
                                                    <div class="accordion-content">
                                                        <h5>Protection measures for everyone</h5>
                                                        <p>Stay aware of the latest information on the COVID-19 outbreak, available on the WHO website and through your national and local public health authority. Many countries around the world have seen cases of COVID-19 and several have seen outbreaks. Authorities in China and some other countries have succeeded in slowing or stopping their outbreaks. However, the situation is unpredictable so check regularly for the latest news.</p>
                                                        <p>You can reduce your chances of being infected or spreading COVID-19 by taking some simple precautions:</p>
                                                        <ul class="list-dot">
                                                            <li>Regularly and thoroughly clean your hands with an alcohol-based hand rub or wash them with soap and water. 
                                                                <br><strong>Why?</strong> Washing your hands with soap and water or using alcohol-based hand rub kills viruses that may be on your hands.</li>

                                                            <li>Maintain at least 1 metre (3 feet) distance between yourself and anyone who is coughing or sneezing. 
                                                                <br><strong>Why?</strong> When someone coughs or sneezes they spray small liquid droplets from their nose or mouth which may contain virus. If you are too close, you can breathe in the droplets, including the COVID-19 virus if the person coughing has the disease.</li>

                                                            <li>Avoid touching eyes, nose and mouth.
                                                                <br><strong>Why?</strong> Hands touch many surfaces and can pick up viruses. Once contaminated, hands can transfer the virus to your eyes, nose or mouth. From there, the virus can enter your body and can make you sick.</li>


                                                            <li>Make sure you, and the people around you, follow good respiratory hygiene. This means covering your mouth and nose with your bent elbow or tissue when you cough or sneeze. Then dispose of the used tissue immediately.
                                                            <br><strong>Why?</strong> Droplets spread virus. By following good respiratory hygiene you protect the people around you from viruses such as cold, flu and COVID-19.</li>

                                                            <li>Stay home if you feel unwell. If you have a fever, cough and difficulty breathing, seek medical attention and call in advance. Follow the directions of your local health authority.
                                                            <br><strong>Why?</strong> National and local authorities will have the most up to date information on the situation in your area. Calling in advance will allow your health care provider to quickly direct you to the right health facility. This will also protect you and help prevent spread of viruses and other infections.</li>

                                                            <li>Keep up to date on the latest COVID-19 hotspots (cities or local areas where COVID-19 is spreading widely). If possible, avoid traveling to places  – especially if you are an older person or have diabetes, heart or lung disease.
                                                            <br><strong>Why?</strong> You have a higher chance of catching COVID-19 in one of these areas.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-protect-02">What should I do if I had close contact with someone who has COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-protect-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Household members, intimate partners, and caregivers in a nonhealthcare setting may have close contact2 with a person with symptomatic, laboratory-confirmed COVID-19 or a person under investigation. Close contacts should monitor their health; they should call their healthcare provider right away if they develop symptoms suggestive of COVID-19 (e.g., fever, cough, shortness of breath)</p>
                                                        <p>Close contacts should also follow these recommendations:</p>
                                                        <ul class="list-dot">
                                                            <li>Make sure that you understand and can help the patient follow their healthcare provider’s instructions for medication(s) and care. You should help the patient with basic needs in the home and provide support for getting groceries, prescriptions, and other personal needs.</li>
                                                            <li>Monitor the patient’s symptoms. If the patient is getting sicker, call his or her healthcare provider and tell them that the patient has laboratory-confirmed COVID-19. This will help the healthcare provider’s office take steps to keep other people in the office or waiting room from getting infected. Ask the healthcare provider to call the local or state health department for additional guidance. If the patient has a medical emergency and you need to call 911, notify the dispatch personnel that the patient has, or is being evaluated for COVID-19.</li>
                                                            <li>Household members should stay in another room or be separated from the patient as much as possible. Household members should use a separate bedroom and bathroom, if available.</li>
                                                            <li>Prohibit visitors who do not have an essential need to be in the home.</li>
                                                            <li>Household members should care for any pets in the home. Do not handle pets or other animals while sick.&nbsp; For more information, see <a href="https://www.cdc.gov/coronavirus/2019-ncov/faq.html/#2019-nCoV-and-animals" target="_blank">COVID-19 and Animals</a>.</li>
                                                            <li>Make sure that shared spaces in the home have good air flow, such as by an air conditioner or an opened window, weather permitting.</li>
                                                            <li>Perform hand hygiene frequently. Wash your hands often with soap and water for at least 20 seconds or use an alcohol-based hand sanitizer that contains 60 to 95% alcohol, covering all surfaces of your hands and rubbing them together until they feel dry. Soap and water should be used preferentially if hands are visibly dirty.</li>
                                                            <li>Avoid touching your eyes, nose, and mouth with unwashed hands.</li>
                                                            <li>The patient should wear a facemask when you are around other people. If the patient is not able to wear a facemask (for example, because it causes trouble breathing), you, as the caregiver, should wear a mask when you are in the same room as the patient.</li>
                                                            <li>Wear a disposable facemask and gloves when you touch or have contact with the patient’s blood, stool, or body fluids, such as saliva, sputum, nasal mucus, vomit, urine.
                                                                <ul>
                                                                    <li>Throw out disposable facemasks and gloves after using them. Do not reuse.</li>
                                                                    <li>When removing personal protective equipment, first remove and dispose of gloves. Then, immediately clean your hands with soap and water or alcohol-based hand sanitizer. Next, remove and dispose of facemask, and immediately clean your hands again with soap and water or alcohol-based hand sanitizer.</li>
                                                                </ul>
                                                            </li>
                                                            <li>Avoid sharing household items with the patient. You should not share dishes, drinking glasses, cups, eating utensils, towels, bedding, or other items. After the patient uses these items, you should wash them thoroughly (see below “Wash laundry thoroughly”).</li>
                                                            <li>Clean all “high-touch” surfaces, such as counters, tabletops, doorknobs, bathroom fixtures, toilets, phones, keyboards, tablets, and bedside tables, every day. Also, clean any surfaces that may have blood, stool, or body fluids on them.
                                                                <ul>
                                                                    <li>Use a household cleaning spray or wipe, according to the label instructions. Labels contain instructions for safe and effective use of the cleaning product including precautions you should take when applying the product, such as wearing gloves and making sure you have good ventilation during use of the product.</li>
                                                                </ul>
                                                            </li>
                                                            <li>Wash laundry thoroughly.
                                                                <ul>
                                                                    <li>Immediately remove and wash clothes or bedding that have blood, stool, or body fluids on them.</li>
                                                                    <li>Wear disposable gloves while handling soiled items and keep soiled items away from your body. Clean your hands (with soap and water or an alcohol-based hand sanitizer) immediately after removing your gloves.</li>
                                                                    <li>Read and follow directions on labels of laundry or clothing items and detergent. In general, using a normal laundry detergent according to washing machine instructions and dry thoroughly using the warmest temperatures recommended on the clothing label.</li>
                                                                </ul>
                                                            </li>
                                                            <li>Place all used disposable gloves, facemasks, and other contaminated items in a lined container before disposing of them with other household waste. Clean your hands (with soap and water or an alcohol-based hand sanitizer) immediately after handling these items. Soap and water should be used preferentially if hands are visibly dirty.</li>
                                                            <li>Discuss any additional questions with your state or local health department or healthcare provider. Check available hours when contacting your local health department.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-protect-03">Who is at higher risk for serious illness from COVID-19? <span class="accordion-icon"></span></h5>
                                                <div id="covid-protect-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p><strong>Older adults and people of any age who have serious underlying medical conditions</strong> may be at higher risk for more serious complications from COVID-19. These people who may be at higher risk of getting very sick from this illness, includes:</p>
                                                        <ul class="list-dot">
                                                            <li><strong>Older adults</strong></li>
                                                            <li><strong>People who have serious underlying medical conditions</strong> like:
                                                                <ul>
                                                                    <li>Heart disease</li>
                                                                    <li>Diabetes</li>
                                                                    <li>Lung disease</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-protect-04">What should people at higher risk of serious illness with COVID-19 do?<span class="accordion-icon"></span></h5>
                                                <div id="covid-protect-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>If you are at higher risk of getting very sick from COVID-19, you should: stock up on supplies; take everyday precautions to keep space between yourself and others; when you go out in public, keep away from others who are sick; limit close contact and wash your hands often; and avoid crowds, cruise travel, and non-essential travel. If there is an outbreak in your community, stay home as much as possible. Watch for symptoms and emergency signs. If you get sick, stay home and call your doctor. More information on how to prepare, what to do if you get sick, and how communities and caregivers can support those at higher risk is available on <a href="https://www.cdc.gov/coronavirus/2019-ncov/specific-groups/high-risk-complications.html" target="_blank">People at Risk for Serious Illness from COVID-19</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-protect-05">Should I wear a mask to protect myself?<span class="accordion-icon"></span></h5>
                                                <div id="covid-protect-05" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Only wear a mask if you are ill with COVID-19 symptoms (especially coughing) or looking after someone who may have COVID-19. Disposable face mask can only be used once. If you are not ill or looking after someone who is ill then you are wasting a mask. There is a world-wide shortage of masks, so WHO urges people to use masks wisely.</p>
                                                        <p>WHO advises rational use of medical masks to avoid unnecessary wastage of precious resources and mis-use of masks  (<a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public/when-and-how-to-use-masks" target="_blank">see Advice on the use of masks</a>).</p>
                                                        <p>The most effective ways to protect yourself and others against COVID-19 are to frequently clean your hands, cover your cough with the bend of elbow or tissue and maintain a distance of at least 1 meter (3 feet) from people who are coughing or sneezing. See basic protective measures against the new coronavirus for more information.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="covid-symptoms">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-symptoms-01">What are the symptoms of COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-symptoms-01" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>The most common symptoms of COVID-19 are fever, tiredness, and dry cough. Some patients may have aches and pains, nasal congestion, runny nose, sore throat or diarrhea. These symptoms are usually mild and begin gradually. Some people become infected but don’t develop any symptoms and don't feel unwell. Most people (about 80%) recover from the disease without needing special treatment. Around 1 out of every 6 people who gets COVID-19 becomes seriously ill and develops difficulty breathing. Older people, and those with underlying medical problems like high blood pressure, heart problems or diabetes, are more likely to develop serious illness. People with fever, cough and difficulty breathing should seek medical attention. </p>
                                                        <p>Read about <a href="https://www.cdc.gov/coronavirus/2019-ncov/symptoms-testing/symptoms.html" target="_blank">COVID-19 Symptoms from CDC.gov</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-symptoms-02">Should I be tested for COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-symptoms-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Not everyone needs to be tested for COVID-19. For information about testing, see <a href="https://www.cdc.gov/coronavirus/2019-ncov/symptoms-testing/testing.html" target="_blank">Testing for COVID-19</a>.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-symptoms-03">Where can I get tested for COVID-19?<span class="accordion-icon"></span></h5>
                                                <div id="covid-symptoms-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>The process and locations for testing vary from place to place. Contact your state, local, tribal, or territorial department for more information, or reach out to a medical provider. State and local public health departments have received tests from CDC while medical providers are getting tests developed by commercial manufacturers. While supplies of these tests are increasing, it may still be difficult to find someplace to get tested.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-symptoms-04">Can a person test negative and later test positive for COVID-19? <span class="accordion-icon"></span></h5>
                                                <div id="covid-symptoms-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Using the CDC-developed diagnostic test, a negative result means that the virus that causes COVID-19 was not found in the person’s sample. In the early stages of infection, it is possible the virus will not be detected.</p>
                                                        <p>For COVID-19, a negative test result for a sample collected while a person has symptoms likely means that the COVID-19 virus is not causing their current illness.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="covid-outbreak">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-01">What should I do if there is an outbreak in my community?<span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-01" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>During an outbreak, stay calm and put your preparedness plan to work. Follow the steps below:</p>
                                                        <p><strong><a href="https://www.cdc.gov/coronavirus/2019-ncov/about/prevention-treatment.html" target="_blank">Protect yourself and others</a>.</strong></p>
                                                        <ul class="list-dot">
                                                            <li>Stay home if you are sick. Keep away from people who are sick. Limit close contact with others as much as possible (about 6 feet).</li>
                                                        </ul>
                                                        <p><strong>Put your household plan into action. </strong></p>
                                                        <ul class="list-dot">
                                                            <li><strong>Stay informed about the local COVID-19 situation</strong>. Be aware of temporary school dismissals in your area, as this may affect your household’s daily routine.</li>
                                                        </ul>
                                                        <ul class="list-dot">
                                                            <li><strong>Continue practicing everyday preventive actions. </strong>Cover coughs and sneezes with a tissue and wash your hands often with soap and water for at least 20 seconds. If soap and water are not available, use a hand sanitizer that contains 60% alcohol. Clean frequently touched surfaces and objects daily using a regular household detergent and water.</li>
                                                            <li><strong>Notify your workplace as soon as possible if your regular work schedule changes.</strong> Ask to work from home or take leave if you or someone in your household gets sick with <a href="https://www.cdc.gov/coronavirus/2019-ncov/about/symptoms.html" target="_blank">COVID-19 symptoms</a>, or if your child’s school is dismissed temporarily. <a href="https://www.cdc.gov/coronavirus/2019-ncov/specific-groups/guidance-business-response.html" target="_blank">Learn how businesses and employers can plan for and respond to COVID-19.</a></li>
                                                            <li><strong>Stay in touch with others by phone or email. </strong>If you have a chronic medical condition and live alone, ask family, friends, and health care providers to check on you during an outbreak. Stay in touch with family and friends, especially those at increased risk of developing severe illness, such as older adults and people with severe chronic medical conditions.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-02">How do I prepare my children in case of COVID-19 outbreak in our community? <span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Outbreaks can be stressful for adults and children. Talk with your children about the outbreak, try to stay calm, and reassure them that they are safe. If appropriate, explain to them that most illness from COVID-19 seems to be mild.</p>
                                                        <p><a href="https://www.cdc.gov/childrenindisasters/helping-children-cope.html" target="_blank">Children respond differently to stressful situations than adults</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-03">What steps should parents take to protect children during a community outbreak? <span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>This is a new virus and we are still learning about it, but so far, there does not seem to be a lot of illness in children. Most illness, including serious illness, is happening in adults of working age and older adults. If there cases of COVID-19 that impact your child’s school, the school may dismiss students. Keep track of school dismissals in your community. Read or watch local media sources that report school dismissals. If schools are dismissed temporarily, use alternative childcare arrangements, if needed.</p>
                                                        <p>If your child/children become sick with COVID-19, notify their childcare facility or school. Talk with teachers about classroom assignments and activities they can do from home to keep up with their schoolwork.</p>
                                                        <p>Discourage children and teens from gathering in other public places while school is dismissed to help slow the spread of COVID-19 in the community.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-04">Will schools be dismissed if there is an outbreak in my community? <span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Depending on the situation, public health officials may recommend community actions to reduce exposures to COVID-19, such as school dismissals. Read or watch local media sources that report school dismissals or and watch for communication from your child’s school. If schools are dismissed temporarily, discourage students and staff from gathering or socializing anywhere, like at a friend’s house, a favorite restaurant, or the local shopping mall.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-05">Can the virus that causes COVID-19 be spread through food, including refrigerated or frozen food?<span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-05" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Coronaviruses are generally thought to be spread from person-to-person through respiratory droplets. Currently there is no evidence to support transmission of COVID-19 associated with food. Before preparing or eating food it is important to always wash your hands with soap and water for 20 seconds for general food safety. Throughout the day wash your hands after blowing your nose, coughing or sneezing, or going to the bathroom.</p>
                                                        <p>It may be possible that a person can get COVID-19 by touching a surface or object that has the virus on it and then touching their own mouth, nose, or possibly their eyes, but this is not thought to be the main way the virus spreads.</p>
                                                        <p>In general, because of poor survivability of these coronaviruses on surfaces, there is likely very low risk of spread from food products or packaging that are shipped over a period of days or weeks at ambient, refrigerated, or frozen temperatures.</p>
                                                        <p>Learn what is known about the <a href="https://www.cdc.gov/coronavirus/2019-ncov/prepare/transmission.html" target="_blank">spread of COVID-19</a>.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-outbreak-06">Should I go to work if there is an outbreak in my community? <span class="accordion-icon"></span></h5>
                                                <div id="covid-outbreak-06" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Follow the advice of your local health officials. Stay home if you can. Talk to your employer to discuss working from home, taking leave if you or someone in your household gets sick with <a href="https://www.cdc.gov/coronavirus/2019-ncov/about/symptoms.html" target="_blank">COVID-19 symptoms</a>, or if your child’s school is dismissed temporarily. Employers should be aware that more employees may need to stay at home to care for sick children or other sick family members than is usual in case of a community outbreak.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="covid-myth">
                                        <div class="accordion accordion-s2">
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-01">COVID-19 virus can be transmitted in areas with hot and humid climates? <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-01" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>From the evidence so far, the COVID-19 virus can be transmitted in ALL AREAS, including areas with hot and humid weather. Regardless of climate, adopt protective measures if you live in, or travel to an area reporting COVID-19. The best way to protect yourself against COVID-19 is by frequently cleaning your hands. By doing this you eliminate viruses that may be on your hands and avoid infection that could occur by then touching your eyes, mouth, and nose.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-02">Cold weather and snow CANNOT kill the new coronavirus<span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-02" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>There is no reason to believe that cold weather can kill the new coronavirus or other diseases. The normal human body temperature remains around 36.5°C to 37°C, regardless of the external temperature or weather. The most effective way to protect yourself against the new coronavirus is by frequently cleaning your hands with alcohol-based hand rub or washing them with soap and water.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-03">Taking a hot bath does not prevent the new coronavirus disease<span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-03" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Taking a hot bath will not prevent you from catching COVID-19. Your normal body temperature remains around 36.5°C to 37°C, regardless of the temperature of your bath or shower. Actually, taking a hot bath with extremely hot water can be harmful, as it can burn you. The best way to protect yourself against COVID-19 is by frequently cleaning your hands. By doing this you eliminate viruses that may be on your hands and avoid infection that could occur by then touching your eyes, mouth, and nose.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-04">The new coronavirus CANNOT be transmitted through mosquito bites. <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-04" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>To date there has been no information nor evidence to suggest that the new coronavirus could be transmitted by mosquitoes. The new coronavirus is a respiratory virus which spreads primarily through droplets generated when an infected person coughs or sneezes, or through droplets of saliva or discharge from the nose. To protect yourself, clean your hands frequently with an alcohol-based hand rub or wash them with soap and water. Also, avoid close contact with anyone who is coughing and sneezing.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-05">Are hand dryers effective in killing the new coronavirus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-05" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>No. Hand dryers are not effective in killing the 2019-nCoV. To protect yourself against the new coronavirus, you should frequently clean your hands with an alcohol-based hand rub or wash them with soap and water. Once your hands are cleaned, you should dry them thoroughly by using paper towels or a warm air dryer.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-06">Can an ultraviolet disinfection lamp kill the new coronavirus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-06" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>UV lamps should not be used to sterilize hands or other areas of skin as UV radiation can cause skin irritation.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-07">How effective are thermal scanners in detecting people infected with the new coronavirus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-07" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>Thermal scanners are effective in detecting people who have developed a fever (i.e. have a higher than normal body temperature) because of infection with the new coronavirus.</p>
                                                        <p>However, they cannot detect people who are infected but are not yet sick with fever. This is because it takes between 2 and 10 days before people who are infected become sick and develop a fever.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h5 class="accordion-title collapsed" data-toggle="collapse" data-target="#covid-myth-08">Do vaccines against pneumonia protect you against the new coronavirus? <span class="accordion-icon"></span></h5>
                                                <div id="covid-myth-08" class="collapse">
                                                    <div class="accordion-content">
                                                        <p>No. Vaccines against pneumonia, such as pneumococcal vaccine and Haemophilus influenza type B (Hib) vaccine, do not provide protection against the new coronavirus.</p>
                                                        <p>The virus is so new and different that it needs its own vaccine. Researchers are trying to develop a vaccine against 2019-nCoV, and WHO is supporting their efforts.</p>
                                                        <p>Although these vaccines are not effective against 2019-nCoV, vaccination against respiratory illnesses is highly recommended to protect your health.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .tab-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->

            <section class="section section-m bg-accent tc-light section-call-to-action" id="cta">
                <div class="container">
                    <div class="section-content">
                        <div class="row g-gs justify-content-between align-items-center">
                            <div class="col-lg-9">
                                <div class="cta-content-block">
                                    <div class="cta-content-icon">
                                      <i class="fas fa-id-card fa-3x"></i>
                                    </div>
                                    <div class="cta-content-text">
                                        <p><strong>Proteksyon Card:</strong>  Get your Virtual Vaccination Card to present on malls, supermarket, hotel, and other places that requires Vaccination Card. Get
                                         informed when you got exposed to COVID-19 with the help of our Contracing System. For Data Privacy you can visit <a style="color: #B3CBFF" href="/privacy-policy">Privacy Policy</a> page in our website.</p>
                                    </div>
                                </div><!-- .text-block -->
                            </div><!-- .col -->
                            <div class="col-lg offset-sm-1 offset-lg-0">
                                <div class="cta-content-action d-flex pl-lg-0 pl-md-1 pl-sm-3 pl-5 ml-sm-0 ml-3">
                                    <a href="/user/register" class="btn btn-white ml-lg-auto toggle-offcanvas" data-offcanvas-toggle="sidebar-info"><i class="far fa-user"></i><span>&nbsp;&nbsp;Register now</span></a>
                                </div>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .section-content -->
                </div><!-- .container -->
            </section><!-- .section -->
        </main><!-- .nk-pages -->

        <footer class="nk-footer">
            <section class="section section-footer section-m bg-light has-overlay">
                <div class="overlay shape shape-b-sm"></div><!-- Overlay Shape -->
                <div class="container">
                    <div class="row g-gs">
                        <div class="col-lg-4 col-md-9 mr-auto">
                            <div class="wgs wgs-about">
                                <div class="wgs-logo logo">
                                    <a href="./" class="logo-link">
                                        <img src="images/logo-dark.png" srcset="images/logo-dark2x.png 2x" alt="logo">
                                    </a>
                                </div>
                                <div class="wgs-about-text">
                                    <p>This website is for Virtual Vaccination ID, Contact Tracing, Health information and advice about coronavirus (COVID-19), how to prevent and protect yourself from disease.</p>
                                </div>
                            </div><!-- .wgs -->
                        </div><!-- .col -->
                        <div class="col-sm-4 col-lg-2">
                            <div class="wgs wgs-menu">
                                <h6 class="wgs-title">Quick Links</h6>
                                <ul class="wgs-links">
                                    <li><a class="scrollto" href="#symptoms">Symptoms</a></li>
                                    <li><a class="scrollto" href="#prevention">Prevention</a></li>
                                    <li><a class="scrollto" href="#protect">Protect Youself</a></li>
                                    <li><a class="scrollto" href="#faq">FAQs</a></li>
                                    <li><a class="scrollto" href="#about">About Corona</a></li>
                                </ul>
                            </div><!-- .wgs -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="nk-dislaimer">
                                <p>Disclaimer: We hope you find the information presented on this website useful. This website is for general information and raise awareness of (2019-nCoV), virtual vaccination card and contact tracing only.
                                  <br class="d-none d-lg-block">
                                    All the information regarding to the statistics of corana virus cases is based on <a href="https://covid19api.com/" target="_blank">covid19api.com</a> website.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .container -->
            </section><!-- .section -->
            <section class="section section-footer">
                <div class="container">
                    <div class="row align-items-center py-3">
                        <div class="col-md-6">
                            <p class="nk-copyright">2021 Proteksyon | Capstone Project of Bachelor of Science in Computer Science Student in Cavite State University - Imus Cavite</p>
                        </div><!-- .col -->
                        <div class="col-md-6">
                            <ul class="nk-footer-links justify-content-md-end">
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                            </ul>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </section><!-- .section -->
        </footer><!-- .nk-footer -->
    </div><!-- .nk-wrap -->

    <div class="nk-offcanvas" id="sidebar-info">
        <div class="nk-offcanvas-close">
            <a href="#" data-offcanvas-toggle="sidebar-info" class="toggle-offcanvas"><em class="icon ni ni-cross"></em></a>
        </div>
        <div class="nk-offcanvas-inner">
            <div class="nk-offcanvas-wg-text">
                <h4 class="title">Login your <span>Account</span></h4>
                <p>Don't have an account yet? <a href="user/register"><strong>Register now</a></strong>.</p>
            </div>

            <div class="nk-offcanvas-cta">
                <a href="/user" class="btn scrollto"><span><i class="fas fa-user"></i>&nbsp; Login as User</span></a>
                <a href="/provider" class="btn scrollto"><i class="fas fa-map-marker-alt"></i>&nbsp; Login as Tracer</span></a>
            </div>

        </div>
    </div>
	<!-- JavaScript -->
	<script src="assets/js/bundle.js?ver=112"></script>
	<script src="assets/js/scripts.js?ver=112"></script>
</body>
</html>
