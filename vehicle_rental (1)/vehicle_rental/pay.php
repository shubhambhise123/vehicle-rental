<?php
	include 'includes/config.php';
	if( isset($_GET['id']) ) {

	}else{
		header("Location:index.php");
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
 


	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				<h3 style="text-decoration: underline">Make Payments Here</h3>
				<h5>Paybill Number: 00000</h5>
				<h6>Business Number: ID Number Registered with.</h6>
				<form method="post">
					<table>
						<tr>
							<td>MPESA Transaction ID : </td>
							<td> <input type="text" class="form-control" name="mpesa" required></td>
						</tr> 
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr> 
							<td>
								Email :</td>
							<td><input type="text" class="form-control" name="email" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr> 
							<td>
								ID Number:</td>
							<td><input type="text" class="form-control" name="pass" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						 
						<tr>
							<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-success btn-sm" name="pay" value="Submit Details"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>

					</table>
				</form>
				<?php
						if(isset($_POST['pay'])){
							$mpesa = $_POST['mpesa'];
							$uname =$_POST['email'];
							$pass = $_POST['pass']; 
							$car_id=$_GET['id'];
					
						$qy = "SELECT * FROM client WHERE email = '$uname' AND id_no = '$pass'";
						$log = $conn->query($qy);
						$num = $log->num_rows;
						$row = $log->fetch_assoc();
						if($num > 0){

							$client_id = $row['client_id'];
							$_SESSION['client_id'] = $row['client_id'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['pass'] = $row['id_no'];
								
							$qr = "INSERT INTO hire (cid, vid,mpesa) 
													VALUES ('$client_id','$car_id','$mpesa')";
								$res = $conn->query($qr);
 								if($res == 1){
									echo "<script type = \"text/javascript\">
									alert(\"Payment Successfully Done. Wait for Admin Approval\");
									window.location = (\"wait.php\")
									</script>";
								} else{
									echo "<script type = \"text/javascript\">
												alert(\"Something Went Wrong. Try Again\");
												window.location = (\"pay.php\")
												</script>";
								}

						}else{
							echo "<script type = \"text/javascript\">
							alert(\"Invlalid Email / Id No\");
							window.location = (\"pay.php\")
							</script>";
						}

						}
						
					  ?>
			</ul>
		 
		</div>
	</section>	<!--  end listing section  -->

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