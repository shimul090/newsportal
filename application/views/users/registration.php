<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<title>Registration</title>
</head>
<body>

	<div class="container">
		<div class="card bg-light mt-3">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Create Account</h4>
				<?php  
					echo validation_errors();
					echo '<br>';
	        		if(!empty($success_msg)){ 
	            		echo '<p class="alert alert-success">'.$success_msg.'</p>'; 
	        		}elseif(!empty($error_msg)){ 
	            		echo '<p class="alert alert-danger">'.$error_msg.'</p>'; 
	        		} 
    			?>
				<form class="needs-validation" action="" method="post" novalidate>
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="Full Name" required>
					    <div class="invalid-feedback">
	        				Please provide your full name
	      				</div>
					</div>

					<div class="form-group input-group">
    					<div class="input-group-prepend">
		    				<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 				</div>
        				<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email Address" required>
        				<div class="invalid-feedback">
        					Please provide your email address
      					</div>
    				</div> <!-- form-group// -->

    				<div class="form-group input-group">
    					<div class="input-group-prepend">
    						<span class="input-group-text"><i class="fa fa-phone"></i></span>
    					</div>
    					<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone Nnumber" required>
                		<div class="invalid-feedback">
                			Please enter your phone number
                		</div>
    				</div>

    				<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
        				<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Create password" required>
        				<div class="invalid-feedback">
        					Please provide your password
      					</div>
    				</div> <!-- form-group// -->
    
    				<div class="form-group input-group">
    					<div class="input-group-prepend">
		    				<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
        				<input type="password" class="form-control" id="conf_password" name="conf_password" value="<?php echo set_value('conf_password'); ?>" placeholder="Confirm Password" required>
				    	<div class="invalid-feedback">
        					Please confirm your password
      					</div>
   	 				</div> <!-- form-group// --> 

   	 				<div class="form-group">
   	 					<input type="submit" name="signupSubmit" class="btn btn-primary btn-block" value="Create Account">
   	 				</div>

   	 				<p class="text-center">Have an account? <a href="<?php echo site_url('users/login'); ?>">Log In</a> </p>   

				</form>
			</article>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

