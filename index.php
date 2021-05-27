<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>E-Library</title>
</head>
<body>
	<div id="hamburger" class="sidenav">
		<a href="javascript:void(0)" class="closebtn"  onclick="closeNav()">&times;</a>
		<a href="index.php">Home</a>
		<a href="alogin.php">Admin Login</a>
		<a href="ulogin.php">User Login</a>
		<a href="new.php">New User</a>
	</div>
	<!-- Hamburger -->
	<span style="font-size: 30px; cursor: pointer;" onclick="openNav()">&#9776;</span>
		<script type="text/javascript">
			function openNav(){
				document.getElementById("hamburger").style.display="block";
			}
			function closeNav(){
				document.getElementById("hamburger").style.display="none";
			}				
		</script>
		<div class="header">
			<h1>E-Library Management System</h1>
		</div>
		<div class="footer">
			<p>CopyRight &copy; V</p>
		</div>
</body>
</html>