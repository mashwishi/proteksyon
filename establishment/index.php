<?php 
  session_start();

  require_once '../db_conn.php';

  if (isset($_SESSION['establishment_id']) && isset($_SESSION['establishment_email'])) {   
    
  $establishment_id =  $_SESSION['establishment_id'];
  $establishment_verified =  $_SESSION['establishment_verified'];

  $establishment_email =  $_SESSION['establishment_email'];
  $establishment_password =  $_SESSION['establishment_password'];

  $establishment_name =  $_SESSION['establishment_name'];
  $establishment_contactno =  $_SESSION['establishment_contactno'];

  $establishment_country =  $_SESSION['establishment_country'];
  $establishment_city =  $_SESSION['establishment_city'];
  $establishment_zipcode =  $_SESSION['establishment_zipcode'];
  $establishment_address =  $_SESSION['establishment_address'];

  $establishment_longitude =  $_SESSION['establishment_longitude'];
  $establishment_latitude =  $_SESSION['establishment_latitude'];

  $establishment_image = $_SESSION['establishment_image'];

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
	<title>Proteksyon | Establishment Dashboard</title>

    <!-- Style Sheets -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Java Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	
    <script type="text/javascript">       
    $(document).ready(function(){   
		fetch_recent_users();
		function fetch_recent_users(query)
		{
			$.ajax({
			url:"./fetch/recent_users.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#recent_users > tbody').html(data);
			}
			});
		} 

		fetch_office();
		function fetch_office(query)
		{
			$.ajax({
				url:"./fetch/office.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#office_name').html(data);
				}
			});
		} 

		stats_office();
		function stats_office(query)
		{
			$.ajax({
				url:"./fetch/stats.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#stats-office').html(data);
				}
			});
		} 
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
			<li class="active">
				<a href="/establishment">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/establishment/activity">
					<i class='bx bxs-cog' ></i>
					<span class="text">Activity</span>
				</a>
			</li>
			<li>
				<a href="/establishment/settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/establishment/logout" class="logout">
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/establishment">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info" id="stats-office">

			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Time In</h3>
						<i></i>
						<i></i>
					</div>
					<table id="recent_users">
						<thead>
							<tr>
								<th>User</th>
								<th>Time-In</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
				<!--
				<div class="todo">
					<div class="head">
						<h3>Trace Request</h3>
						<i class=''></i>
						<i class=''></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p></p>
							<i class='bx bx-info-circle'></i>
						</li>
						<li class="not-completed">
							<p></p>
							<i class='bx bx-error'></i>
						</li>
					</ul>
				</div>-->
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
    header("Location: /establishment/login");
  }
?>