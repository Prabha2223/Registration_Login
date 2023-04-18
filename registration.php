<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<title>Registration</title>
	<script>
		$(document).ready(function() {
		setInterval(function() {
		  $.ajax({
			  url: 'insert_data.php',
			  success: function(response) {
				  $('#result').html(response);
			  },
			  error: function(xhr, status, error) {
				  console.log(xhr.responseText);
			  }
		  });
	  }, 1000);
  });
  
  setTimeout(function() {
	clearInterval(interval); // Clear the interval after one interval even if the code hasn't executed yet
  }, 2000); // Clear the interval after 1 second (1000 milliseconds)
  
  
  $(document).ready(function() {
	  $('#registration-form').submit(function(e) {
		  e.preventDefault();
		  var formData = $(this).serialize();
		  $.ajax({
			  type: 'POST',
			  url: 'register.php',
			  data: formData,
			  success: function(response) {
				  $('#response').html(response);
			  }
		  });
	  });
  }); 
	  </script>
	</head>
	<script language="javascript" type="text/javascript">
		window.history.forward();
	  </script>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">SignUp</h3>

				  <center><div id="response"></div></center>

		      	<form  class="signin-form" id="registration-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="username" placeholder="Username" required>
		      		</div>
					  <div class="form-group">
						<input type="text" class="form-control" placeholder="email" name="email" required>
					</div>
					<div class="form-group">
						<input type="password"class="form-control" placeholder="password" name="password" required>
					</div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">register</button>
	            </div>
	          </form>
			  <div class="form-group">
				<a href="login.php"><button type="submit" class="form-control btn btn-primary submit px-3">Already have account</button></a>
			</div>	        
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

