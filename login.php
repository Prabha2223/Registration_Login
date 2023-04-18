<?php
session_start();
require 'config.php';
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM details WHERE username = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
	
    if($password == $row['password']){
	 $_SESSION["username"]=$usernameemail;
      header("Location:profile.php");
    }
    else{
      echo "<script> alert('Wrong Password'); </script>";
    }
  } 
  else{
    echo "<script> alert('User Not Registered'); </script>";
  } 
} 
?>
<!doctype html>
<html lang="en">
  <head>
  <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<title>login</title>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Login</h3> 
		      	<form  class="signin-form" method="post" autocomplete="off">
		      		<div class="form-group">
					  <input type="text" name="usernameemail" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	          </form>
			  <div class="form-group">
				<a href="registration.php"><button type="submit" class="form-control btn btn-primary submit px-3">Registration</button></a>
			</div>	        
		      </div>
				</div>
			</div>
		</div>
	</section>
	</body>
</html>

