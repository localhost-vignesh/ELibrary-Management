<?php
session_start();
require 'database.php';

if (!isset($_SESSION["ID"])) 
{
	header("location:ulogin.php");
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
		<a href="uhome.php">Home</a>
		<a href="search_Book.php">Search Book</a>
		<a href="request.php">Request</a>
		<a href="uchangepass.php">Change Password</a>
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
			<h2 id="heading">New Book Request</h2>
			<div id="center">
				<?php
					if (isset($_POST["submit"])) 
					{
					 	$sql="insert into request(ID,MES,LOGS) values ('{$_SESSION["ID"]}','{$_POST["mess"]}',now())";
					 	$conn->query($sql);
					 	echo "<P class='success'>Request Send To Admin</p>";
					} 
				?>
				<div class="card">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<textarea name="mess" placeholder="Message" id="name" required></textarea>
					<button type="submit" name="submit">Request</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	
</html>