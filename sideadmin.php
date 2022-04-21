<div id="hamburger" class="sidenav">
		<a href="javascript:void(0)" class="closebtn"  onclick="closeNav()">&times;</a>
		<a href="ahome.php">Home</a>
		<a href="View_Student.php">View Student</a>
		<a href="View_Book.php">View Book</a>
		<a href="View_com.php">View Comments</a>
		<a href="View_req.php">View Request</a>
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