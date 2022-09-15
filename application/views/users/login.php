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

	<title>Login</title>
</head>
<body>

	<div class="container">
		<div class="card bg-light mt-3">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center">Login to your account</h4>
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
    					<span class="input-group-text"><i class="fa fa-user"></i></span>
    				</div>
    				<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
    					<div class="invalid-feedback">
	        			Please provide your email
	      			</div>
    			</div>

						<div class="form-group input-group">
    						<div class="input-group-prepend">
    								<span class="input-group-text"><i class="fa fa-key"></i></span>
    						</div>
    						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    						<div class="invalid-feedback">
	        					Please provide your password
	      				</div>
    				</div>

    				<div class="form-group">
    						<input type="submit" name="loginSubmit" class="btn btn-primary btn-block" value="Login">
    				</div>
    				<p class="text-center">New To TrueNews? <a href="<?php echo site_url('users/registration'); ?>">Create an account</a> </p>   
    		</form>
			</article>
		</div>
	</div>

				  
				  	<!--<div class="form-group mt-3">
				  		<div class="row">
				  			<label for="password">Password</label>
				  		</div>
				    	
				    	<div class="row">
				    		<input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
				    		<i class="bi bi-eye-slash" id="togglePassword"></i>
				    		<div class="invalid-feedback">
        						Please provide your password
      						</div>
      					</div>
				  	</div>-->

				  	


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

<script type="text/javascript">
	const togglePassword = document.querySelector('#togglePassword');
	const password = document.querySelector('#password');
    
    togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
</script>