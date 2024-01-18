<?php
	include '../includes/config.php';

	if(!isset($_REQUEST['hid'])   ){
		header("location: client_requests.php");
	}else{

	$id = $_REQUEST['hid'];
	$query = "UPDATE hire SET status = 'Approved' WHERE id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
		alert(\"Status Successfully Approved\");
		window.location = (\"client_requests.php\") 
		</script>";

	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
		<?php
		}
	}
?>
