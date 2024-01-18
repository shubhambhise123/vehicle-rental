<?php
	session_start();
	if(!isset($_SESSION['admin_uname']) && !isset($_SESSION['admin_pass']) ){
		header("location: ../login.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
	<script type="text/javascript">

	window.onload=function(){
		show_bar_chart();
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
			Dashboard
		</div>
		
		<br />
		
		<div id="main">
			<div class="cl">&nbsp;</div>
			 
			
			<div class="row">
     <div class="col-sm-6">
        <div class="card">    
          <div class="card-body" > 
          <h4 style="text-align:center"> Vehicles</h4>
            <canvas id="crsc_pie" style="height:150px;width:300px" ></canvas>

			<button class="btn btn-warning btn-sm" onclick="document.location.href='add_vehicles.php'"> View</button>
                

           </div>
        </div>
     </div>

     <div class="col-sm-6">
        <div class="card">
          <div class="card-body" > 
          <h4 style="text-align:center"> Enquiries</h4> 
            <canvas id="enq_piec" style="height:150px;width:300px"></canvas>

			<button class="btn btn-warning btn-sm" onclick="document.location.href='enquiry.php'"> View</button>
                

           </div>
        </div>
      </div>
    </div> <br>

   <div class="card">
     <div class="card-body" > 
       <canvas id="std_bar" style="height:80px;width:300px"></canvas>
        </div>
    </div>
			
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->


<script>

 var myPieChart;
 var enqchart;
var barChart;

function show_bar_chart(){

  $.ajax({
      type: "POST",
      url: "../includes/functions.php",
      data: {"RESULT_TYPE":"CRSC_PIECHART"},
      success: function(Jasondata){
		  console.log(Jasondata)
      var crsc_pie=JSON.parse(Jasondata)
        var ctxP = document.getElementById("crsc_pie").getContext('2d');

          if(myPieChart==undefined){
            myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
            labels: crsc_pie.STD,
            datasets: [{
            data:crsc_pie.PAY,
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }]
            }
            });
        }else{
          myPieChart.data={
            labels: crsc_pie.STD,
            datasets: [{
            data:crsc_pie.PAY,
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360","#FFA500","#1589FF","#F75D59", "#7D0552","#9D00FF",  "#00FA9A"],
            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774","#FFAE42","#1E90FF","#E55451", "#872657" ,"#B041FF", "#36F57F"]
            }]
          }
          myPieChart.update();
        }

    }
    });

    $.ajax({
      type: "POST",
      url: "../includes/functions.php",
      data: {"RESULT_TYPE":"ENQ_PIECHART"},
      success: function(Jasondata){
		console.log(Jasondata)
      var enq_data=JSON.parse(Jasondata)

      var ctxPx = document.getElementById("enq_piec").getContext('2d');
        if(enqchart==undefined){
          enqchart = new Chart(ctxPx, {
          type: 'pie',
          data: {
          labels:enq_data.Cname,
          datasets: [{
          data:enq_data.Total,
          backgroundColor: [ "#FFA500","#1589FF","#F75D59", "#7D0552","#9D00FF",  "#00FA9A","#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: [ "#FFAE42","#1E90FF","#E55451", "#872657" ,"#B041FF", "#36F57F","#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
          }]
          }
          });
      }else{
        enqchart.data={
          labels:enq_data.Cname,
          datasets: [{
          data:enq_data.Total,
          backgroundColor: [ "#FFA500","#1589FF","#F75D59", "#7D0552","#9D00FF",  "#00FA9A"],
          hoverBackgroundColor: [ "#FFAE42","#1E90FF","#E55451", "#872657" ,"#B041FF", "#36F57F"]
          }]
        }
        enqchart.update();
      }

    }
    })



   $.ajax({
    type: "POST",
    url: "../includes/functions.php",
    data: {"RESULT_TYPE":"STD_BARCHART" },
    success: function(Jasondata){
		console.log(Jasondata)
     var std_bar=JSON.parse(Jasondata)

      var opctxP = document.getElementById("std_bar").getContext('2d');   

      if(barChart==undefined){

       barChart = new Chart(opctxP, {
        type: 'bar',
        data: {
          labels:std_bar.CRSC,
              datasets: [
                    {
                      label: "Clients",
                      backgroundColor: "#0080ff",
                      data: std_bar.STD
                    }, {
                      label: "Hires",
                      backgroundColor: "#ff4d4d",
                      data:std_bar.PAY
                    }                 
                    
                  ]
                },
          options: {
            title: {
              display: true,
              // text: 'Meter Reading Status'
            }
              }
        });

    }else{
        barChart.data={
          labels:std_bar.CRSC,
          datasets: [
          {
            label: "Clients",
            backgroundColor: "#0080ff",
            data: std_bar.STD
          }, {
            label: "Hires",
            backgroundColor: "#ff4d4d",
            data:std_bar.PAY
          }                                 
        ]
      }
      barChart.update();
    }   

      }
    });

}

</script>

<!-- chart cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</body>
</html>