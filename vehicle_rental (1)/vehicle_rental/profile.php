<?php 
  include 'includes/config.php';
  
  if( isset($_SESSION['client_id']) && isset($_SESSION['email']) && isset($_SESSION['pass']) ){
    $client_id=$_SESSION['client_id'];
        $qy = "SELECT * FROM client WHERE client_id = '$client_id' ";
        $result = $conn->query($qy);
        $row = $result->fetch_assoc();
        		
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
			
				<h3>Update Profile :- </h3>
				<form method="post">
					<table>
						<tr>
							<td>Full Name:</td>
							<td><input type="text" class="form-control" id="fname" value="<?php echo (isset($_SESSION['client_id']))?$row['fname']:'';?>" name="fname" required></td>
						</tr> 
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Phone Number: </td>
							<td><input type="text" class="form-control"   value="<?php echo (isset($_SESSION['client_id']))?$row['phone']:'';?>"   name="phone" pattern="[0-9]{10}" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Email Address:</td>
							<td><input type="email" class="form-control" id="email" value="<?php echo (isset($_SESSION['client_id']))?$row['email']:'';?>" name="email" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>ID Number:</td>
							<td><input type="text" class="form-control" id="id_no" value="<?php echo (isset($_SESSION['client_id']))?$row['id_no']:'';?>" name="id_no" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td>
								<select class="form-control" name="gender" value="<?php echo (isset($_SESSION['client_id']))?$row['gender']:'';?>" id="gender"> 
									<option disabled> Select Gender </option>
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
							<td><input type="text" class="form-control" id="location" value="<?php echo (isset($_SESSION['client_id']))?$row['location']:'';?>" name="location" required></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center"><input type="submit" class="btn btn-success " name="Update" value="Update"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['Update'])){ 

							$fname = $_POST['fname'];
							$id_no = $_POST['id_no'];
							$gender = $_POST['gender'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$location = $_POST['location'];
							$client_id = $_SESSION['client_id'];
							
							$qry = "UPDATE client SET fname = '$fname', email = '$email',id_no = '$id_no', Phone = '$phone',location = '$location', gender = '$gender' WHERE client_id='$client_id' "; 
                             
							$result = $conn->query($qry);
							if($result == 1){
								echo "<script type = \"text/javascript\">
											alert(\"Profile Successfully Updated.\");
											window.location = (\"profile.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Something Went Wrong. Try Again\");
											window.location = (\"profile.php\")
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