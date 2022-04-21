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
			<h2 id="heading">Send Your Comment</h2>
				<?php
				if (isset($_POST["submit"])) 
				{
				 	$sql="insert into comment(BID,SID,COMM,LOGS) values ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["mes"]}',now())";
		 		 	$conn->query($sql);
				} 
				$sql="select * from book where BID=".$_GET["id"];
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					echo "<table>";
					$row=$res->fetch_assoc();
					echo "
						<tr>
							<th>Book Name</th>
							<th>Keywords</th>
						</tr>
						<tr>
							<td>{$row["BTITLE"]}</td>
							<td>{$row["KEYWORDS"]}</td>
						</tr>
					";
					echo "<table>";
				}
				else
				{
					echo "<p class='error'>No Books Found</P>";
				}
				?>
			<div id="cen">
				<div class="card">
				<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
					<textarea name="mes" placeholder="Your Comments" id="name" required></textarea>
					<button type="submit" name="submit">Post</button>
				</form>
				</div>
			</div>
			<?php
				$sql="select student.NAME,comment.COMM,comment.LOGS from comment INNER join student on comment.SID=student.ID where comment.BID={$_GET["id"]} order by comment.CID DESC";
				$res=$conn->query($sql);
				if($res->num_rows>0)
				{
					while ($row=$res->fetch_assoc()) 
					{
						echo "<p><strong>{$row["NAME"]} :
						{$row["COMM"]} </strong>
						<i>{$row["LOGS"]}</i>
						</p>";
					}
				}
				else
				{
					echo "<p class='error'>No Comment Yet..</p>";
				}
			?>
		</div>
	</div>
</html>