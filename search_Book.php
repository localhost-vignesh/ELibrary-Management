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
			<h2 id="heading">Search Books</h2>
			<div id="cen">
				<div class="card">
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<input type="text" name="name" placeholder="Enter Book Name" id="name" required><br>
					<button type="submit" name="submit">Search</button>
				</form>
			</div>	
			</div>
			<?php 
			if (isset($_POST["submit"])) 
			{
				$sql="SELECT * FROM  book where BTITLE like '%{$_POST["name"]}%' OR KEYWORDS LIKE '%{$_POST["name"]}%'";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					echo "<table class='link'>
							<tr>
								<th>SNO</th>
								<th>BOOK NAME</th>
								<th>KEYWORDS</th>
								<th>VIEW</th>
								<th>COMMENT</th>
							</tr>";
							$i=0;
						while ($row=$res->fetch_assoc()) 
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row["BTITLE"]}</td>";
							echo "<td>{$row["KEYWORDS"]}</td>";
							echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
							echo "<td><a href='comment.php?id={$row["BID"]}'>Go</a></td>";
							echo "</tr>";	
						}
					echo "</table>";
				}
				else
				{
					echo "<p class='error'>No Bookks Found</P>";
				}
			}
			?>

		</div>
	</div>
	
</html>