<div id="hamburger" class="sidenav">
		<a href="javascript:void(0)" class="closebtn"  onclick="closeNav()">&times;</a>
		<a href="index.php">Home</a>
		<a href="alogin.php">Admin Login</a>
		<a href="ulogin.php">User Login</a>
		<a href="new.php">New User</a>
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