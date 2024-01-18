<?php
	include '../includes/config.php';
	if(!isset($_SESSION['admin_uname']) && !isset($_SESSION['admin_pass']) ){
		header("location: ../login.php");
	}else{
        $car_id = $_GET['id'];
        $qy = "SELECT * FROM cars WHERE car_id = '$car_id' ";
        $result = $conn->query($qy);
        $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
</head>
<body>
<div id="header">
	<div class="shell">
		
		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Admin</a>
			<span>&gt;</span>
			Add New Vehicles
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<div class="box-head">
						<h2>Add New Vehicles</h2>
					</div>
					
					<form action="" method="post" enctype="multipart/form-data">
						
						<div class="form">
								<p>
									<span class="req">max 100 symbols</span>
									<label>Vehicle Name <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_name" required value="<?php echo (isset($_SESSION['admin_uname']))?$row['car_name']:'';?>"  />
								</p>	
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Make <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="car_type" required value="<?php echo (isset($_SESSION['admin_uname']))?$row['car_type']:'';?>" />
								</p>
								<p>
									<span class="req">max 20 symbols</span>
									<label>Vehicle Hire Price <span>(Required Field)</span></label>
									<input type="text" class="field size1" name="hire_cost" required value="<?php echo (isset($_SESSION['admin_uname']))?$row['hire_cost']:'';?>" />
								</p>
								<p>
									<span class="req">Current Images</span>
									<label>Vehicle Image <span>(Required Field)</span></label>
									<input type="file" class="field size1" name="image" required  />
								</p>
								<p>
									<span class="req">In Terms of Passenger Seats</span>
									<label>Vehicle Capacity<span>(Required Field)</span></label>
									<input type="text" class="field size1" name="capacity" required value="<?php echo (isset($_SESSION['admin_uname']))?$row['capacity']:'';?>" />
								</p>	
							
						</div>
						
						<div class="buttons">
							<input type="reset" class="btn btn-warning btn-sm" value="Reset" />
							<input type="submit" class="btn btn-success btn-sm" value="Update" name="update" />
						</div>
						
					</form>
					<?php
							if(isset($_POST['update'])){
								
								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);

								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
								
								$image = basename($_FILES['image']['name']);
								$car_name = $_POST['car_name'];
								$car_type = $_POST['car_type'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];
								$car_id = $row['car_id'];
								
								$qry = "UPDATE cars SET car_name = '$car_name',car_type = '$car_type',image = '$image',hire_cost = '$hire_cost',capacity = '$capacity' WHERE car_id='$car_id' "; 
                             
                                $result = $conn->query($qry);
                                if($result == 1){
                                    echo "<script type = \"text/javascript\">
                                                alert(\"Vehicle Successfully Updated.\");
                                                window.location = (\"add_vehicles.php\")
                                                </script>";
                                } else{
                                    echo "<script type = \"text/javascript\">
                                                alert(\"Something Went Wrong. Try Again\");
                                                window.location = (\"add_vehicles.php\")
                                                </script>";
                                }

								}else {

                                echo "<script type = \"text/javascript\">
                                alert(\"Something Went Wrong. Try Again\");
                                window.location = (\"edit_vehicle.php\")
                                </script>";
                                }
							}
						?>
				</div>

			</div>
			
			<div id="sidebar">
				
				<div class="box">
					
					<div class="box-head">
						<h2>Management</h2>
					</div>
					
					<div class="box-content">
						<a href="add_vehicles.php" class="add-button"><span>View Our Vehicles</span></a>
						<div class="cl">&nbsp;</div>
						 
						
					</div>
				</div>
			</div>
			
			<div class="cl">&nbsp;</div>			
		</div>
	</div>
</div>
 
	
</body>
</html>