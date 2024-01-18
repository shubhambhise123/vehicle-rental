<?php
	// session_start();
	// error_reporting("E-NOTICE");
?>
<header>
			<div class="wrapper">
				<h1 class="logo"> MyVehicle </h1>
				<a href="#" class="hamburger"></a>
				<nav >
					<?php
						if(!isset($_SESSION['email']) && !isset($_SESSION['pass']) && !isset($_SESSION['client_id']) ){
					?>
					<ul>
						<li><a href="index.php">Home</a></li> 
						<li><a href="#about">About</a></li>
						<li><a href="#form_div">Contact</a></li>
					</ul>
					<a href="account.php">Client Login</a>
					<a href="login.php">Admin Login</a>
					<?php
						} else{
					?>
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="status.php">View Status</a></li>
								<li><a href="message_admin.php">Message Admin</a></li>
								<li><a href="profile.php">Profile</a></li>
							</ul>
					<a href="logout.php">Logout</a>
					<?php
						}
					?>
				</nav>
			</div>
		</header>