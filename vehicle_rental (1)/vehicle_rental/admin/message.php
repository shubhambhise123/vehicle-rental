<?php
	include '../includes/config.php';
	if(!isset($_SESSION['admin_uname']) && !isset($_SESSION['admin_pass']) ){
		header("location: ../login.php");
	}else{
        $qry = "UPDATE message SET status = 'Read'  ";               
        $result = $conn->query($qry);
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
			if(confirm("Are you sure you want to delete this message?")){
				window.location.href ='delete_msg.php?id='+id;
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
		<!-- End Main Nav -->
	</div>
</div>

<div id="container">
	<div class="shell">
		
		<div class="small-nav">
			<a href="index.php">Admin</a>
			<span>&gt;</span>
			Messages
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			
			<div id="content">
				
				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Messages</h2>
						<div class="right">
						<!--- 	<label>search messages</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />  --->
						</div>
					</div>
					
					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr> 
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Message Content</th>
								<th>Time Send</th>
								<th>Status</th>
								<th >-</th>
							</tr>
							<?php
								
								$select = " SELECT message.msg_id,client.fname,client.phone,message.message,message.time,message.status FROM `message` INNER JOIN client ON client.client_id=message.client_id ";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $row['fname'] ?></td> 
								<td><?php echo $row['phone'] ?></td> 
								<td><?php echo $row['message'] ?></td>
								<td><?php echo $row['time'] ?></td>
								<td><?php echo $row['status'] ?></td>
								<td><a href="javascript:sureToApprove(<?php echo $row['msg_id'];?>)" class="ico del"> </a></td>
							</tr>
							<?php
								}
							?>
						</table>
						 
						
					</div> <br>
					<h2><input type="submit" class="btn btn-primary btn-sm"  onclick="window.print()" value="Print Here" /></h2>
					
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