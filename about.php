<?php  
 $connect = mysqli_connect("localhost", "root", "", "bank");  
 $query = "SELECT * FROM cust";  
 $result = mysqli_query($connect, $query);  
 ?>  
<!DOCTYPE html>  
<html>  
<head>  
    <title>View Customers</title>  
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/bankicon.png" rel="icon">
	<link href="assets/img/bankicon.png" rel="icon">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    
	<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		}

	tr:nth-child(even) {
		background-color: #dddddd;
		}
		
	input[type=text] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	box-sizing: border-box;
	border: none;
	border-bottom: 2px solid grey;
		}
	.button {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	transition-duration: 0.4s;
	cursor: pointer;
	}
	
    .button1 {
	background-color: white; 
	color: black; 
	border: 2px solid blue;
	}
	
	.button1:hover {
	background-color: blue;
	color: white;
	}
		
	</style>
</head>  

<body>  
	<header id="header" class="fixed-top">
		<div class="container-fluid d-flex justify-content-between align-items-center">

		<h1 class="logo me-auto me-lg-0"><a href="about.php">View Customers</a></h1>

		<nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a class="active" href="about.php">Transaction</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
		</nav>

		<div class="header-social-links"></div>

		</div>

	</header>
	
<section id="about" class="about">
	<div class="section-title">
		<div class="container">  
		    <div id="employee_table">  
			<h2><br>Customers</h2>  
                <table class="table table-bordered">  
                    <tr>  
                        <th>Name</th>  
                        <th>Email</th>  
                        <th>Current Balance</th>  
					</tr>  
                    <?php  
                        while($row = mysqli_fetch_array($result))  
                        {  
					?>  
                    <tr>  
                        <td>
							<input type="button" name="edit" id="<?php echo $row["b_id"]; ?>" class="btn edit_data" value="<?php echo $row["name"]; ?>">
						</td>  
                        <td><?php echo $row["email"]; ?></td>  
                        <td><?php echo $row["curr_bal"]; ?></td>  
                    </tr>  
                    <?php  
                        }  
					?>  
                </table>  
            </div>  
		</div>  
</section>     
</body>  
</html>  

<div id="add_data_Modal" class="modal fade">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">         
                <h3 style="font-family:'Times'">Transcation</h3>  
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<button type="button" class="close" data-dismiss="modal">&times;</button>  
            </div>  
            <div class="modal-body">  
                <form method="post" id="insert_form">  
                    <input type="text" name="name" id="name" class="form-control" /> <br />  
                    
                    <input type="text" name="rname" id="rname" class="form-control" placeholder="Receiver Name" />  
                    <br />  
                    <input type="text" name="amt" id="amt" class="form-control" placeholder="Amount"/>  <br />  
                    
                    <input type="hidden" name="employee_id" id="employee_id" />  
                    <input type="submit" name="insert" id="insert"  class="button button1" />  
                </form>  
            </div>  
                  
        </div>  
    </div>  
</div>  

 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     
                     $('#rname').val(data.rname);  
                     $('#amt').val(data.amt);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Transfer Money");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           
           if($('#rname').val() == '' && $('#amt').val() == '')  
           {  
                alert("Please! Fill all the fields.");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });    
 });  
 </script>
 