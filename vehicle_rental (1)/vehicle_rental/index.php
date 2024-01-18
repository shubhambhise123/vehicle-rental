
<?php
	include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vehicle Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS only -->
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
						$sel = "SELECT * FROM cars WHERE status = 'Available'";
						$rs = $conn->query($sel);
						while($rws = $rs->fetch_assoc()){
			?>
				<li>
					<a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
						<img class="thumb" src="cars/<?php echo $rws['image'];?>" width="300" height="200">
					</a>
					<span class="price"><?php echo $rws['hire_cost']. ' RS.';?></span>
					<div class="property_details">
						<h1>
							<a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Vehicle Make>'.$rws['car_type'];?></a>
						</h1>
						<h2>Vehicle Name/Model: <span class="property_size"><?php echo $rws['car_name'];?></span></h2>
					</div>
				</li>
			<?php
				}
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

	<?php
		if(!isset($_SESSION['email']) && (!isset($_SESSION['pass']))){
	?>

	<div class="container" id="form_div">
		<h2>Contact Form</h2>
		<div > 
			<form   action="" method="post" enctype="multipart/form-data">
				<div class="w3-col m6" style="padding:0px 10px"><p><input class="w3-input w3-border" type="text" placeholder="Your Name" required="" name="Name" ></p></div>
				<div class="w3-col m6" style="padding:0px 10px"><p><input class="w3-input w3-border" type="number" placeholder="Phone Number" required="" name="Phone" pattern="[0-9]{10}"  ></p> <br></div>
				<div class="w3-col m6" style="padding:0px 10px"><p><input class="w3-input w3-border" type="text" placeholder="Location" required="" name="City"></p> </div>
				<div class="w3-col m6" style="padding:0px 10px"><p><input class="w3-input w3-border" type="text" placeholder="Which Vehicle Do You Want For Rent" required="" name="Vehicle" ></p> <br></div>
				<p>
					<button class="w3-button w3-black" type="submit" name="enq_form">
					<i class="fa fa-paper-plane"></i> SEND ENQUIRY
					</button>
				</p>
			</form>
		</div>
		</div> <br>
    <?php } ?>

	<?php
		if(isset($_POST['enq_form'])){
									
			$name = $_POST['Name'];
			$phone = $_POST['Phone'];
			$city = $_POST['City'];
			$vehicle = $_POST['Vehicle'];
			
			$qr = "INSERT INTO enquiry (name, phone,city,vehicle) 
								VALUES ( '$name','$phone','$city','$vehicle')";
			$res = $conn->query($qr);
			if($res === TRUE){
				echo "<script type = \"text/javascript\">
						alert(\"Vehicle Enquiry Succesfully Send\");
						window.location = (\"index.php\")
						</script>";

				
				}
			 
		}						
	?>


	<footer>
		<div class="wrapper footer">
			<ul>
				<li class="links">
					<ul>
						<li>OUR COMPANY</li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Terms</a></li>
						<li><a href="#">Policy</a></li>
						<li><a href="#form_div">Contact</a></li>
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

				<?php include_once "includes/footer.php"; ?>