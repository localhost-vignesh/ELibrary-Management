<?php
session_start();
 require 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Library</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
		
	<div id="container">
		<div class="header">
			<h1>E-Library Management System</h1>
		</div>
		<div class="wrapper">
			<h2 id="heading">Admin Login</h2>
			<div class="tab">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql= "SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' AND APASS='{$_POST["apass"]}'";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result) > 0)
						{
							$row =$result->fetch_assoc();
							$_SESSION["AID"]=$row["AID"];
							$_SESSION["ANAME"]=$row["ANAME"];
							header("location:ahome.php");
						}
						else
						{
							echo "<p class='er'>Invalid User</p>";
						}
					}
				?>
				
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>