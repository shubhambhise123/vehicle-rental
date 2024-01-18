<?php
	include '../includes/config.php';
	if(!isset($_SESSION['admin_uname']) && !isset($_SESSION['admin_pass']) ){
		header("location: ../login.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript">
		function sureToDelete(id){
			if(confirm("Are you sure you want to Delete this Client ?")){
				window.location.href ='delete_client.php?id='+id;
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

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Admin</a>
			<span>&gt;</span>
			Clients
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Clients</h2>
						<div class="right">
					
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<th> Name</th>
								<th> Phone</th>
								<th> Email</th>
								<th> ID No</th>
								<th> Location</th>
								<th> Gender</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								 
								$select = "SELECT * from client";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr> 
								<td><?php echo $row['fname'] ?></h3></td>
								<td><?php echo $row['phone'] ?></h3></td>
								<td><?php echo $row['email'] ?></td>
								<td> <?php echo $row['id_no'] ?> </td>
								<td><?php echo $row['location'] ?></td>
								<td><?php echo $row['gender'] ?></td>
								<td><a href="javascript:sureToDelete(<?php echo $row['client_id'];?>)" class="ico del">Delete </a></td>							
								
							</tr>
							<?php
								}
							?>
						</table>
						
						
					</div> <br>
					<h2><input type="submit" class="btn btn-primary btn-sm" onclick="window.print()" value="Print Here" /></h2>
					
				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->
 
	
</body>
</html>