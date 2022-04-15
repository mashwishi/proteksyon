<?php 
  session_start();

  require_once '../db_conn.php';

if (isset($_SESSION['admin_user_id']) && isset($_SESSION['admin_user_email'])) {     
	$user_id = $_SESSION['admin_user_id'];
	$user_uuid = $_SESSION['admin_user_uuid'];
	$user_avatar =  $_SESSION['admin_user_avatar'];

	$user_first_name = $_SESSION['admin_user_first_name'];
	$user_middle_name = $_SESSION['admin_user_middle_name'];
	$user_last_name = $_SESSION['admin_user_last_name'];

	$user_gender = $_SESSION['admin_user_gender'];
	$user_birthday = $_SESSION['admin_user_birthday'];

	$user_country = $_SESSION['admin_user_country'];
	$user_city = $_SESSION['admin_user_city'];
	$user_address = $_SESSION['admin_user_address'];

	$user_contactno = $_SESSION['admin_user_contactno'];

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
	<title>Proteksyon | Admin Dashboard</title>

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

		fetch_recent_providers();
		function fetch_recent_providers(query)
		{
			$.ajax({
			url:"./fetch/recent_provider.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#recent_providers').html(data);
			}
			});
		} 

		fetch_office();
		function fetch_office(query)
		{
			$.ajax({
				url:"./fetch/admin.php",
				method:"post",
				data:{query:query},
				success:function(data)
				{
					$('#admin_name').html(data);
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
				<a href="/admin">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/admin/users">
					<i class='bx bx-user' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			<li>
				<a href="/admin/providers">
					<i class='bx bx-building' ></i>
					<span class="text">Providers</span>
				</a>
			</li>
			<li>
				<a href="/admin/verification">
					<i class='bx bx-list-check' ></i>
					<span class="text">Verification</span>
				</a>
			</li>
			<li>
				<a href="/admin/requests">
					<i class='bx bxs-inbox' ></i>
					<span class="text">Requests</span>
				</a>
			</li>
			<li>
				<a href="/admin/reports">
					<i class='bx bxs-megaphone' ></i>
					<span class="text">Reports</span>
				</a>
			</li>
			<li>
				<a href="/admin/settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/admin/logout" class="logout">
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
					
					<h1 id="admin_name">
					</h1>
					
					<span class="text" id="status_office"></span>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/admin">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info" id="stats-office">

			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Users</h3>
						<i></i>
						<i></i>
					</div>
					<table id="recent_users">
						<thead>
							<tr>
								<th>User</th>
								<th>Email</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

				</div>
				<div class="todo">
					<div class="head">
						<h3>Recent Providers</h3>
						<i class=''></i>
						<i class=''></i>
					</div>
					<ul class="todo-list" id="recent_providers">
					</ul>
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
    header("Location: /admin/login");
  }
?>