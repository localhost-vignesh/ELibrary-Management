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
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<h2 id="heading">Change Password</h2>
			<div id="center">
				<?php
					if (isset($_POST["submit"])) 
					{
					 	$sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
					 	$res=$conn->query($sql);
					 	if($res->num_rows>0)
					 	{
					 		$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
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