<?php  
 $connect = mysqli_connect("localhost", "root", "", "bank");  
 if(!empty($_POST))  
 {  
       
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $rname = mysqli_real_escape_string($connect, $_POST["rname"]);  
      $amt = mysqli_real_escape_string($connect, $_POST["amt"]);  
      
           $query = "UPDATE cust set curr_bal=curr_bal+'$amt'  WHERE name='".$_POST["rname"]."'";    
		   $result = mysqli_query($connect, $query);  
		   		   
		   $queryS = "UPDATE cust set curr_bal=curr_bal-'$amt'  WHERE name='".$_POST["name"]."'";  
           $result = mysqli_query($connect, $queryS);  
		   
		   header('header:about.php');
		   echo '<script language="javascript">';
		   echo 'window.confirm("Transaction Done Successfully..")';
		   echo '</script>';
		   
 }
 ?>