<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	 
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
			Enquiries
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Enquiries</h2>
						<div class="right">
						<!---	<label>search requests</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />   -->
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th>Enquiry Name</th>
								<th>Enquiry Phone</th>
								<th>Location</th>
								<th>Vehicle</th>  
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT * FROM `enquiry` ";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr> 
								<td><h3> <?php echo $row['name'] ?></h3></td>
								<td><h3> <?php echo $row['phone'] ?></h3></td> 
								<td> <?php echo $row['city'] ?></td>
								<td> <?php echo $row['vehicle'] ?></td>
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