<?php
	include '../includes/config.php';
	if(!isset($_SESSION['admin_uname']) && !isset($_SESSION['admin_pass']) ){
		header("location: ../login.php");
	}else{
        $qy = "SELECT * FROM admin ";
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

    <script>
function showPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<?php
			include 'menu.php';
		?>
		
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#">Dashboard</a>
			<span>&gt;</span>
			Admin Profile
		</div>
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<!-- Content -->
			<div id="content">
				
				
				
				<!-- Box -->
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2>Update Profile</h2>
					</div>
					<!-- End Box Head -->
					
					<form action="" method="post" enctype="multipart/form-data">
						
						<!-- Form -->
						<div class="form">
							<div class="row">
                                <div class="col-md">
                                    <label >Username :- </label>
                                    <input type="text" class="form-control" name="uname" value="<?php echo (isset($_SESSION['admin_uname']))?$row['uname']:'';?>">
                                </div>
                            </div> <br>
                                <div class="row">
                                <div class="col-md">
                                    <label >Password :- </label>
                                    <input type="password" class="form-control" id="pass" name="password" value="<?php echo (isset($_SESSION['admin_pass']))?$row['pass']:'';?>">
                                </div>
                            </div> <br>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onclick="showPass()"  id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault"> Show Password </label>
                            </div>
                            	
						</div> <br>
						<!-- End Form -->
						
						<!-- Form Buttons -->
						<div class="buttons">
							<input type="reset" class="btn btn-warning btn-sm" value="Reset" />
							<input type="submit" class="btn btn-success btn-sm" name="update" value="Update" />
						</div>
						<!-- End Form Buttons -->
					</form>
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			 
            <?php
						if(isset($_POST['update'])){ 

							$uname = $_POST['uname'];
							$pass = $_POST['password'];
							$admin_id =$row['admin_id'];
							
							$qry = "UPDATE admin SET uname = '$uname',pass = '$pass' WHERE admin_id='$admin_id' "; 
                             
							$result = $conn->query($qry);
							if($result == 1){
								echo "<script type = \"text/javascript\">
											alert(\"Profile Successfully Updated.\");
											window.location = (\"admin_profile.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Something Went Wrong. Try Again\");
											window.location = (\"admin_profile.php\")
											</script>";
							}
						}
						
			?>

			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->
 
</body>
</html>