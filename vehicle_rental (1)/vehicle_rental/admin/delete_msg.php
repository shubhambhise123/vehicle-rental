<?php
	include '../includes/config.php';
	if( isset($_REQUEST['id']) ){

	$id = $_REQUEST['id'];
		$query = "DELETE FROM message WHERE msg_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Message Successfully Deleted\");
					window.location = (\"message.php\")
				</script>";
	}else{
		echo "<script type = \"text/javascript\">
					alert(\"Message Can Not Be Delete\");
					window.location = (\"message.php\")
				</script>";
	}

}else{
	header("location: message.php");
}
?>
