<?php
	include '../includes/config.php';
	if( isset($_REQUEST['id']) ){

	$id = $_REQUEST['id'];

    $query = "DELETE FROM hire WHERE id = '$id'";
	$result = $conn->query($query);
		if($result === TRUE){
			echo "<script type = \"text/javascript\">
						alert(\"Client Request Successfully Deleted\");
						window.location = (\"client_requests.php\")
					</script>";
		}else{
			echo "<script type = \"text/javascript\">
						alert(\"Client Request Can Not Be Delete\");
						window.location = (\"client_requests.php\")
					</script>";
		}

	}else{
		header("location: client_requests.php");
	}
?>
