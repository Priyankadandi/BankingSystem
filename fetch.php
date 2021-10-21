<?php  
 $connect = mysqli_connect("localhost", "root", "", "bank");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM cust WHERE b_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 