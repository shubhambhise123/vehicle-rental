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
			<?php 
						$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
						$rs = $conn->query($sel);
						$rws = $rs->fetch_assoc();
			?>
				<li>
					<a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo 'Kshs.'.$rws['hire_cost'];?></span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Car Make>'.$rws['car_type'];?></a>
						</h1>
						<h2>Vehicle Name/Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
					</div>
				</li>
				<h3>Proceed to Hire <?php echo $rws['car_name'];?>. </h3>
				<?php
					if(!isset($_SESSION['email']) && (!isset($_SESSION['pass']))){
				?>
				<form method="post">
					<table>
						<tr>
							<td>Full Name:</td>
							<td><input type="text" name="fname" class="form-control" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Phone Number:</td>
							<td><input type="text"  class="form-control" name="phone" pattern="[0-9]{10}" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="email"  class="form-control" name="email" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>ID Number:</td>
							<td><input type="text"  class="form-control" name="id_no" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td>
								<select  class="form-control" name="gender">
									<option> Select Gender </option>
									<option> Male </option>
									<option> Female </option>
								</select>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Location:</td>
							<td><input type="text"  class="form-control" name="location" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-primary btn-sm" name="save" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
					} else
						{
							?>
								<a href="pay.php?id=<?php echo $_GET['id']; ?>" id="pay_link">Click to Book</a>
							<?php
						}
				?>
				<?php
						if(isset($_POST['save'])){
							
							$fname = $_POST['fname'];
							$id_no = $_POST['id_no'];
							$gender = $_POST['gender'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$location = $_POST['location'];
							$car_id=$_GET['id'];
							
							$qry = "INSERT INTO client (fname,id_no,gender,email,phone,location)
							VALUES('$fname','$id_no','$gender','$email','$phone','$location')";
							$result = $conn->query($qry);
							if($result == TRUE){
 
								echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered. Proceed to pay\");
											window.location = (\"pay.php?id=$car_id\")
											</script>";
 
							}else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"book_car.php\")
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
					<ul>
						<li>OUR VEHICLE TYPES</li>
						<li><a href="#">KTM</a></li>
						<li><a href="#">BMW</a></li>
						<li><a href="#">NINJA</a></li>
						<li><a href="#">Others.</a></li>
					</ul>

				<?php include_once "includes/footer.php" ?>