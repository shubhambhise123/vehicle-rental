<?php
	include '../includes/config.php';
	if( isset($_REQUEST['id']) ){

	$id = $_REQUEST['id'];
	$query = "DELETE FROM client WHERE client_id = '$id'";
	$result = $conn->query($query);
		if($result === TRUE){
			echo "<script type = \"text/javascript\">
						alert(\"Client Successfully Deleted\");
						window.location = (\"clients.php\")
					</script>";
		}else{
			echo "<script type = \"text/javascript\">
						alert(\"Client Can Not Be Delete\");
						window.location = (\"clients.php\")
					</script>";
		}

	}else{
		header("location: clients.php");
	}
?>
