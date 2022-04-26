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
			<h2 id="heading">View Request Details</h2>
			<?php 
				$sql="SELECT student.NAME,request.MES,request.LOGS from student inner join request on student.ID=request.ID";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					echo "<table class='link'>
							<tr>
								<th>SNO</th>
								<th>NAME</th>
								<th>MESSAGE</th>
								<th>LOGS</th>
							</tr>";
							$i=0;
						while ($row=$res->fetch_assoc()) 
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row["NAME"]}</td>";
							echo "<td>{$row["MES"]}</td>";
							echo "<td>{$row["LOGS"]}</td>";
							echo "</tr>";	
						}
					echo "</table>";
				}
				else
				{
					echo "<p class='error'>No Request Found</P>";
				}
			?>
		</div>
	</div>
	
</html>