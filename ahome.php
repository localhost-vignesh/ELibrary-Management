<?php
session_start();
require 'database.php';
function countRecord($sql,$conn)
{
	$res=$conn->query($sql);
	return $res->num_rows;
}

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
			<h2 id="heading">Welcome Admin</h2>
			
		</div>
	</div>
	<div class="tab">
				<ul class="rec">
					<li>Total Students : <?php echo countRecord("select * from student",$conn); ?> </li>
					<li>Total Books : <?php echo countRecord("select * from book",$conn); ?> </li>
					<li>Total Request : <?php echo countRecord("select * from request",$conn); ?> </li>
					<li>Total Comments : <?php echo countRecord("select * from comment",$conn); ?> </li>
				</ul>
			</div>
</body>
</html>