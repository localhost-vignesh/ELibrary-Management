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
			<h2 id="heading">User Login</h2>
			<div class="tab">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql= "SELECT * FROM student WHERE NAME='{$_POST["name"]}' AND PASS='{$_POST["pass"]}'";
						$result = mysqli_query($conn,$sql);
						if(mysqli_num_rows($result) > 0)
						{
							$row =$result->fetch_assoc();
							$_SESSION["ID"]=$row["ID"];
							$_SESSION["NAME"]=$row["NAME"];
							header("location:uhome.php");
						}
						else
						{
							echo "<p class='er'>Invalid User</p>";
						}
					}
				?>
				<div id="center">
					<div class="card">
					<form action="ulogin.php" method="post">
						<input type="text" name="name" placeholder="Name" id="name" required><br>
						<input type="password" name="pass" placeholder="Password" id="name" required><br>
						<button type="submit" name="submit" id="btn">Login</a></button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>