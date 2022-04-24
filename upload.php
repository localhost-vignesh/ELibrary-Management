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
			<h2 id="heading">Upload Book</h2>
			<div id="center">
				<?php
					if (isset($_POST["submit"])) 
					{
					 	$target_dir="upload/";
					 	$target_file=$target_dir.basename($_FILES["efile"]["name"]);
					 	if (move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file)) 
					 	{
					 		$sql="insert into book(BTITLE,KEYWORDS,FILE) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
			 		 		$conn->query($sql);
					 		echo "<P class='success'>Upload Success</p>";
					 	}
					 	else
					 	{
					 		echo "<P class='error'>Error In Uoload</p>";
					 	}

					} 
				?>
				<div class="card">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
					<input type="text" name="bname" placeholder="Book Title" id="name" required><br>
					<textarea name="keys" placeholder="Keyword" id="name" required></textarea><br>
					<label>Upload file</label>
					<input type="file" name="efile" required>
					<button type="submit" name="submit">Upload</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	
</html>