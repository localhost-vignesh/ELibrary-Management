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
			<h2 id="heading">View Student Details</h2>
			<?php 
				$sql="SELECT * FROM  student";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					echo "<table>
							<tr>
								<th>SNO</th>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>DEPARTMENT</th>
							</tr>";
							$i=0;
						while ($row=$res->fetch_assoc()) 
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row["NAME"]}</td>";
							echo "<td>{$row["MAIL"]}</td>";
							echo "<td>{$row["DEP"]}</td>";
							echo "</tr>";	
						}
					echo "</table>";
				}
				else
				{
					echo "<p class='error'>No Records Found</P>";
				}
			?>
		</div>
	</div>
	
</html>