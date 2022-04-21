<?php
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Library</title>
	<link rel="stylesheet" type="text/css" href="css/asty.css">
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
			<h2 id="heading">New User Registration</h2>
			<div id="center">
				<?php
					if (isset($_POST["submit"])) 
					{
					 	$sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
			 		 		$conn->query($sql);
					 		echo "<P class='success'>User Registration Success</p>";
					} 
				?>
				<div class="card">
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<input type="text" name="name" placeholder="Name" id="name" required><br>
						<input type="password" name="pass" placeholder="Password" id="name" required><br>
						<input type="email" name="mail" placeholder="Email" id="name" required>
						<select name="dep" id="sel" required>
							<option value="">Select</option>
							<option value="BCA">BCA</option>
							<option value="B.SC">B.SC</option>
							<option value="MCA">MCA</option>
							<option value="M.SC">M.SC</option>
						</select>
						<button type="submit" name="submit" id="btn">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</html>