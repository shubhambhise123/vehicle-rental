<?php
	include 'includes/config.php';
	if( isset($_SESSION['client_id']) && isset($_SESSION['email']) && isset($_SESSION['pass']) ){
		
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

	<style>
		.table {}
.table th{ background:#fffdfa url(admin/css/images/th.gif) repeat-x 0 0; color:#818181; text-align: left; padding:7px 10px; border-bottom:solid 1px #d2d1cb;}
.table td{ background:#fbfcfc;  border-bottom:solid 1px #e0e0e0; padding:8px 10px; }
.table tr.odd td{ background:#f8f8f8; }
.table tr:hover td{ background:#fff9e1; }
.table a.ico{ }
	</style>
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
		<h2 style="color:black">Your Booking History :- </h2>
			 

			<div class="table">
						<table width="100%"  cellspacing="0" cellpadding="0">
							<tr> 
								<th>Name</th>
								<th>Phone</th>
								<th>Vehicle Booked</th>
								<th>Mpesa ID</th>
								<th>Amount</th>
								<th>Status</th> 
								<th>Date</th> 
							</tr>
							<?php
							 
								$select = "SELECT hire.id as hid,client.fname,client.phone,cars.car_name,cars.hire_cost,hire.mpesa,hire.status,hire.timestamp FROM client JOIN hire ON client.client_id=hire.cid INNER JOIN cars ON hire.vid=cars.car_id where hire.cid=".$_SESSION['client_id']." ORDER BY hire.timestamp DESC"; 
								$result = $conn->query($select);
								$num = mysqli_num_rows ( $result );
								if($num > 0){
								while($row = $result->fetch_assoc()){
							?>
							<tr> 
								<td><?php echo $row['fname'] ?></td>
								<td><?php echo $row['phone'] ?></td>
								<td><?php echo $row['car_name'] ?></td>
								<td> <?php echo $row['mpesa'] ?> </td>
								<td><?php echo $row['hire_cost'] ?></td>
								<td><?php echo $row['status'] ?></td>
								<td><?php echo $row['timestamp'] ?></td>
							</tr>
							<?php
								}
							} 
							?>
						</table>
						
						
					</div> <br>
					<h2><input type="submit" class="btn btn-primary btn-sm" onclick="window.print()" value="Print Here" /></h2>
					


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