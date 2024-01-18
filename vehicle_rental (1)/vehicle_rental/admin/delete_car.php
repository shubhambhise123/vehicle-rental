<?php
	include '../includes/config.php';
	if( isset($_REQUEST['id']) ){

	$id = $_REQUEST['id'];
	$query = "DELETE FROM cars WHERE car_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Vehicle Delete Successfully \");
					window.location = (\"add_vehicles.php\")
				</script>";
	}else{
		echo "<script type = \"text/javascript\">
					alert(\"Vehicle Can Not Be Delete  \");
					window.location = (\"add_vehicles.php\")
				</script>";
	}

	}else{
		header("location: add_vehicles.php");
	}
?>
