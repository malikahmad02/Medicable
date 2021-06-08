<?php 
	include('conn_db.php'); 
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <script src="fontawesome.js"></script>
    <title>Clinic</title>
</head>
<body style="background-color: #E9EFFF;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MEDICABLE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Doctor Management<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="patient.php">Patient Management</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" onclick="change_password()">Change Password</a>
            </li>
          </ul>
          <button class="btn btn-outline-success my-2 my-sm-0 buttons" type="submit" style="background-color: #c00">Logout</button>
        </div>
    </nav>

    <style>
		/* The popup form - hidden by default */
		.form-popup {
		  display: none;
		  position: fixed;
		  bottom: 0;
		  right: 15px;
		  border: 3px solid #f1f1f1;
		  z-index: 9;
		}

		/* Add styles to the form container */
		.form-container {
		  max-width: 300px;
		  padding: 10px;
		  background-color: white;
		}

		/* Full-width input fields */
		.form-container input[type=text], .form-container input[type=password] {
		  width: 100%;
		  padding: 15px;
		  margin: 5px 0 22px 0;
		  border: none;
		  background: #f1f1f1;
		}

		/* When the inputs get focus, do something */
		.form-container input[type=text]:focus, .form-container input[type=password]:focus {
		  background-color: #ddd;
		  outline: none;
		}

		/* Add a red background color to the cancel button */
		.form-container .cancel {
		  background-color: #c00;
		}

		/* Add some hover effects to buttons */
		.form-container .btn:hover, .open-button:hover {
		  opacity: 1;
		}
	</style>

	<div class="form-popup" id="myForm">
  		<form action="/action_page.php" class="form-container">
	   		<h3>Change Password</h3>

		    <label for="email"><b>Email</b></label>
		    <input class="form-control inputbar" placeholder="Enter Email" name="email" required> <br>

		    <label for="psw"><b>Current Password</b></label>
		    <input class="form-control inputbar" placeholder="Enter Password" name="psw" required> <br>

		    <label for="psw"><b>New Password</b></label>
		    <input class="form-control inputbar" placeholder="Enter Password" name="psw" required> <br>
		    <center>
		    	<button class="btn btn-outline-success my-2 my-sm-0 buttons" class="btn">Change Password</button> <br> <br>
		    	<button type="button" class="btn cancel buttons" onclick="closeForm()">Close</button>
			</center>
	 	</form>
	</div>

	<script>
		function change_password() {
		  document.getElementById("myForm").style.display = "block";
		 }

		function closeForm() {
		  document.getElementById("myForm").style.display = "none";
		 }
	</script>


    <div class="container">
        <div class="jumbotron jumbo">
            <h1>Clinic Doctors</h1>
            <form class="form-inline my-2 my-lg-0">
            	<input class="form-control mr-sm-2 inputbar" type="search" placeholder="Search" aria-label="Search">
            	<button class="btn btn-outline-success my-2 my-sm-0 buttons" type="submit">Search</button>
          	</form> <br>
            <div class="text-center">
            	<center>
              <table style="margin-left: 10%; margin-right: 20%;"> 		
                <tr> 
                  <td>				
                    <strong>Surname</strong>
                  </td> 
                    
                  <td>
                    <strong>Name</strong>				
                  </td> 

                  <td> 
                    <strong>Fiscal Code</strong> 
                  </td> 
                  <td> 
                    <strong> <table>Date of Birth</table> </strong> 
                  </td> 	
                  <td> 
                    <strong>Role</strong> 
                  </td> 		
                  <td>
                    <strong>Management</strong>
                  </td>	
                </tr> 

                <?php 
                  $i=0;
                  $sql="SELECT cognome, nome, codFiscale, dataNascita, nomeRuolo FROM medico";
                  $query=mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($query)) {						
                ?> 
            <tr>
              <td>
                <?php echo $row['cognome']; ?> 
              </td> 
                
              <td> 	
                <?php echo $row['nome']; ?> 
              </td>
              
              <td> 
                <?php echo $row['codFiscale']; ?> 
              </td> 
              <td> 
                <?php echo $row['dataNascita']; ?> 
              </td>
              <td> 
                <?php echo $row['nomeRuolo']; ?> 
              </td>
              <td>
                <?php echo '<a href="view_all_data.php?view=' .$row['codFiscale'] . ' " class="trash">'?><i class="fa fa-eye" aria-hidden="true"></i></a>
              </td>          
              </tr> 
          </center>
              <?php $i++; } ?> 
              </table> 
            </div>
            <hr class="my-4">
            <!--<p class="lead">
              <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>-->
        </div>
    </div>
    
</body>
</html>