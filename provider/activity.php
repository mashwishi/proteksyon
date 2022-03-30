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
	<title>Proteksyon | Provider Activity</title>

    <!-- Style Sheets -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Java Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	
    <script type="text/javascript">       
        $(document).ready(function(){ 
            
            $('.dateFilter').datepicker({
                dateFormat: "yy-mm-dd"
            });

            fetch_recent_users();
            function fetch_recent_users(query)
            {
                $.ajax({
                url:"./fetch/user_activity.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#recent_users > tbody').html(data);
                }
                });
            
            } 

            $('#btn_search').click(function () {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                $.ajax({
                    url: "./fetch/dateRange.php",
                    method: "POST",
                    data: { from_date: from_date, to_date: to_date },
                    success: function (data) {
                    $('#recent_users > tbody').html(data);
                    }
                });
                }
                else {
                alert("Please Select the Date");
                }
            });

        }); 
    </script>   
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-shield'></i>
			<span class="text">
			<img style="width: 100%;" src="../images/logo-dark2x.png" alt="logo">	
			</span>
			
		</a>
		<ul class="side-menu top">
			<li>
				<a href="/provider">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="/provider/activity">
					<i class='bx bxs-cog' ></i>
					<span class="text">Activity</span>
				</a>
			</li>
			<li>
				<a href="/provider/settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/provider/logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					
					<h1 id="office_name">
					<!-- office name -->
					</h1>
					
					<span class="text" id="status_office"></span>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="/provider/activity">Activity</a>
						</li>
					</ul>
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>User Activities</h3>
					</div>
                    <div class="container" style="margin-bottom: 50px;">
                        <form class="form-inline" method="POST" action="">
                            <div class="row">
                                <div class="col-sm">
                                    <input type="text" name="from_date" id="from_date" class="form-control dateFilter" style="width: 100%;" placeholder="From Date" />
                                </div>
                                <div class="col-sm">
                                    <input type="text" name="to_date" id="to_date" class="form-control dateFilter" style="width: 100%;" placeholder="To Date" />
                                </div>
                                <div class="col-sm">
                                    <input type="button" name="search" id="btn_search" value="Filter" style="width: 100%;" class="btn btn-primary" />
                                </div>
                            </div>
                        </form>
                    </div>
					<table id="recent_users">
						<thead>
							<tr>
								<th>User</th>
                                <th>Email</th>
                                <th>Contact No.</th>
                                <th>City</th>
								<th>Time-In</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="assets/js/dashboard.js"></script>
</body>
</html>
<?php 
  }
  else{
    header("Location: /provider/login");
  }
?>