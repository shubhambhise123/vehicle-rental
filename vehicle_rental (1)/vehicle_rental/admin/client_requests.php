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
		function sureToApprove(id){
			if(confirm("Are you sure you want to Approve this request?")){
				window.location.href ='approve.php?hid='+id;
			}
		}

		function deleteReq(id){
			if(confirm("Are you sure you want to Delete this request?")){
				window.location.href ='delete_cl_req.php?id='+id;
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
			Client Requests
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
						<div class="right">
						<!---	<label>search requests</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />   -->
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Vehicle Booked</th>
								<th>Mpesa ID</th>
								<th>Amount</th>
								<th>Status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								 
								$select = "SELECT hire.id as hid,client.fname,client.phone,cars.car_name,cars.hire_cost,hire.mpesa,hire.status FROM client JOIN hire ON client.client_id=hire.cid INNER JOIN cars ON hire.vid=cars.car_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr> 
								<td><h3><a href="#"><?php echo $row['fname'] ?></a></h3></td>
								<td><h3><a href="#"><?php echo $row['phone'] ?></a></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td> <?php echo $row['mpesa'] ?> </td>
								<td><?php echo $row['hire_cost'] ?></td>
								<?php if($row['status']=="Pending"){
									echo "<td style='color:red'> ".$row['status'] ."</td>";
									echo '<td><a  href="javascript:deleteReq('. $row['hid'] .')" class="ico del">Delete</a><a href="javascript:sureToApprove('. $row['hid'] .')" class="ico edit">Approve?</a></td>';
								}else{
									echo "<td style='color:green'> ".$row['status'] ."</td>";
									echo '<td><a  href="javascript:deleteReq('. $row['hid'] .')" class="ico del">Delete</a><a  class="ico edit" disabled>Approved</a> </td>';
								}
								?>
								
								
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