<?php 
session_start();
ob_start();
if (empty($_SESSION['is_login'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Angularjs</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="assets/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="assets/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="assets/adminlte.min.css">
<link rel="stylesheet" href="assets/angular-loading.css">
<!-- <link rel="stylesheet" href="assets/jquery-ui_datepicker.css"> -->
<link rel="stylesheet" href="js/jquery-ui-1.11.4.custom/jquery-ui.css">
<!-- <link rel="stylesheet" href="assets/toastr.min.css"> -->
<link rel="stylesheet" href="assets/sweetalert2.min.css">

<script src="assets/jquery.min.js"></script>
<script src="assets/adminlte.js"></script>
<script src="assets/bootstrap.bundle.min.js"></script> <!-- add modal -->
<script src="assets/angular.min.js"></script>
<script src="assets/angular-datepicker.js"></script>
<script src="assets/jquery-ui_datepicker.js"></script>
<script src="assets/spin.min.js"></script>
<script src="assets/angular-loading.min.js"></script>
<script src="assets/chart.js/Chart.min.js"></script>
<!-- <script src="assets/toastr.min.js"></script> -->
<script src="assets/sweetalert2.min.js"></script>
<script src="js/bs-custom-file-input.min.js"></script>

<body>	
	<div class="wrapper">
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="assets/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>
		<section class="content">
			<div class="container-fluid">
				<nav class="navbar navbar-expand navbar-white navbar-light">
					<ul class="navbar-nav">
						<li class="nav-item">
				        	<a class="nav-link" data-widget="pushmenu" href="index.php" role="button">
				        		<img class="img-fluid" src="assets/AdminLTELogo__.png" alt="AdminLTELogo" height="40" width="40">
				        	</a>
				      	</li>
			            <li class="nav-item d-none d-sm-inline-block">
							<a href="logout.php" class="nav-link">Logout</a>
						</li>
					</ul>
				</nav>
				<?php
				@$content = strip_tags(addslashes($_GET['content']));
				@$action = strip_tags(addslashes($_GET['action']));
				@$message = strip_tags(addslashes($_GET['message']), '<b>');
				if (empty($content))  $content = 'home';
				if (empty($action)) $action = 'index';
				if (!empty($message)) echo "<div class='alert alert-info' role='alert'>$message</div>";
				require("$content/$action.php");
				?>
			</div>
		</section>
	</div>	
</body>
</html> 