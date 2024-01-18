<?php  	
include 'includes/config.php';
  if( isset($_SESSION['admin_uname']) && isset($_SESSION['admin_pass'])  ){
   		header("Location:admin/index.php");
    }	 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vehicle Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Vehicles For Hire</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
	</section><!--  end hero section  -->



	<section class="search">
		<div class="wrapper">
		<div id="fom">
			<form method="post">
			<h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:underline">Admin Login Area</h3>
				<table height="100" align="center">
					<tr>
						<td>Email :</td>
						<td><input type="text" class="form-control" name="admin_uname" placeholder="Enter Username" required autofocus></td>
					</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" class="form-control" name="admin_pass" placeholder="Enter Password" required></td>
					</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
					<tr>
						<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-success btn-sm" name="admin_login" value=" Login "></td>
					</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['admin_login'])){
									
					$uname = $_POST['admin_uname'];
					$pass = $_POST['admin_pass'];
					
					$query = "SELECT * FROM admin WHERE uname = '$uname' AND pass = '$pass'";
					$rs = $conn->query($query);
					$num = $rs->num_rows;
					$rows = $rs->fetch_assoc();
					if($num > 0){ 
						$_SESSION['admin_uname'] = $rows['uname'];
						$_SESSION['admin_pass'] = $rows['pass'];
						echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"admin/index.php\")
									</script>";
					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"login.php\")
									</script>";
					}
				}
			?>
			</div>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>

	</section><!--  end search section  -->

	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li>OUR COMPANY</li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</li>

				<li class="links">
					<ul>
						<li>OTHERS</li>
						<li><a href="#">...</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">...</a></li>
					</ul>
				</li>

				<li class="links">
				<ul>
						<li>OUR VEHICLE TYPES</li>
						<li><a href="#">KTM</a></li>
						<li><a href="#">BMW</a></li>
						<li><a href="#">NINJA</a></li>
						<li><a href="#">Others.</a></li>
					</ul>
				</li>

				<?php include_once "includes/footer.php" ?>