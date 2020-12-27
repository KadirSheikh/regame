<?php include 'common/header.php'; ?>

<body>
  <div class="main">
  <?php include 'common/nav.php'; ?>
    
<section>
  <div class="row">
	<div class="col-md-12 login-bg">

	</div>
	<div class="container">
	  <div class="col-md-6 col-md-offset-3 login-form-block">
		<h2>Forgot Password</h2>
				<form action="https://bygame.in/forgot-password" method="post">
			<input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">			  <div class="form-group">
				<input type="text" name="mobile_no" class="form-control login-input " placeholder="Enter Phone Number" value="" required>
							  </div>
			  <div class="form-group text-center">
				<button type="submit" class="btn btn-info login-form-btn">Send OTP</button>
			  </div>
		</form>
	  </div>
	  <div class="col-md-6 col-md-offset-3 login-form text-center">
		<p>Login Here</p>
		<a href="login.php" class="btn btn-warning signup-btn">Login</a>
	  </div>
	</div>
  </div>
</section>



<?php include 'common/footer.php'; ?>
  </div>
</body>
