<?php
session_start();
require 'database.php';

if (!isset($_SESSION["AID"])) 
{
	header("location:alogin.php");
}
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
		<a href="ahome.php">Home</a>
		<a href="View_Student.php">View Student</a>
		<a href="View_Book.php">View Book</a>
		<a href="View_com.php">View Comments</a>
		<a href="View_req.php">View Request</a>
		<a href="upload.php">Upload</a>
		<a href="achangepass.php">Change Password</a>
		<a href="logout.php">Logout</a>
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
			<h2 id="heading">Change Password</h2>
			<div id="center">
				<?php
					if (isset($_POST["submit"])) 
					{
					 	$sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
					 	$res=$conn->query($sql);
					 	if($res->num_rows>0)
					 	{
					 		$s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
					 		$conn->query($s);
					 		echo "<P class='success'>Password Changed</p>";
					 	}
					 	else
					 	{
					 		echo "<P class='error'>Invalid Password</p>";
					 	}
					} 
				?>
				<div class="card">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<input type="Password" name="opass" placeholder="Old Password" id="name" required><br>
					<input type="Password" name="npass" placeholder="New Password" id="name" required><br>
					<button type="submit" name="submit">Change</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	
</html>