<?php  

include 'config.php';
 

switch($_POST['RESULT_TYPE']){

    case "CRSC_PIECHART":
        $std_pie=crse_piechart();
        echo  json_encode($std_pie);
        break;

     case "ENQ_PIECHART":
        $enq_pie=enq_piechart();
        echo  json_encode($enq_pie);
        break;
  
     case "STD_BARCHART":
        $std_bar=std_barchart();
        echo  json_encode($std_bar);
        break;
        
}


function crse_piechart(){
    global $conn;
  $stmt = $conn->prepare(" SELECT COUNT(*)as total,car_name FROM `cars`  GROUP BY car_name LIMIT 10 ");
   if ($stmt) {  
      if ($stmt->execute()){
        $result=$stmt->get_result();
        $std_array=array();
        $pay_array=array();
     
       while ( $row=$result->fetch_assoc()) {
         array_push($std_array, $row['car_name'].' ' );
          array_push($pay_array,$row['total']);
     
       }
  
        return array("STD"=>$std_array,"PAY"=>$pay_array);
  
       }else{
          return $conn->error;
         }
  } 
   else{
       return 7;
   }
  }
  
  function enq_piechart(){
    global $conn;
  $stmt = $conn->prepare("SELECT name,phone FROM `enquiry` GROUP BY id LIMIT 10  ");
   if ($stmt) {  
      if ($stmt->execute()){
        $result=$stmt->get_result();
        $std_array=array();
        $pay_array=array();
     
       while ( $row=$result->fetch_assoc()) {
         array_push($pay_array,$row['name'].' ');
         array_push($std_array, $row['phone'] );
     
       }
  
        return array("Cname"=>$pay_array,"Total"=>$std_array);
  
       }else{
          return $conn->error;
         }
  } 
   else{
       return 7;
   }
  }

  function std_barchart(){
    global $conn; 
  $stmt = $conn->prepare("SELECT COUNT(client.client_id)as clients,COUNT(hire.id)as hires,cars.car_name FROM `client` LEFT JOIN hire ON client.client_id=hire.cid INNER JOIN cars ON hire.vid=cars.car_id GROUP BY cars.car_name  ");
   if ($stmt) {  
      if ($stmt->execute()){
        $result=$stmt->get_result();
        $std_array=array();
        $pay_array=array();
        $crsc_array=array();
  
       while ( $row=$result->fetch_assoc()) {
         array_push($std_array,$row['clients']);
         array_push($pay_array,$row['hires']);
         array_push($crsc_array,$row['car_name']);
  
       }
  
        return array("STD"=>$std_array,"PAY"=>$pay_array,"CRSC"=>$crsc_array);
  
       }else{
          return $conn->error;
         }
  } 
   else{
       return 7;
   }
  }

 

?>