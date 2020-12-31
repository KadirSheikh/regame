<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<body>
  <div class="main">
  <?php include 'common/nav.php'; ?>
	<?php 
	error_reporting(0);
	$emailErr = $passErr = $cpassErr = "";
	if (isset($_POST['reset_pass'])) {

		if (empty($_POST["email"])) {
			$emailErr = "*Email is required";
		  }else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "You have entered an invalid email address!";
			}else{
			  $_email = test_input($_POST["email"]);
			 
			 
			}
		  }


		  if (empty($_POST["password"])) {
			$passErr = "*Password is required";
		  } else {
			$password = test_input($_POST["password"]);
			if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $password)) {
			  $passErr = 'Minimum 8 and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character!';
		  }else{
			$psw = test_input($_POST["password"]);
			$psw = password_hash($psw ,PASSWORD_DEFAULT);
			  
			}
		
		  }

		  
		  if (empty($_POST["confirm_password"])) {
			$cpassErr = "*Confirm password is required";
		  } else if($_POST["password"] != $_POST["confirm_password"]){
			$cpassErr = "Password do not matched!";
		   
		  }else{
			  $_cpass = test_input($_POST["confirm_password"]);
		  }

		  if(!empty($_email) && !empty($psw) && !empty($_cpass) ){
			
			$query = "UPDATE `users_tbl` SET `password`=  '{$psw}' WHERE email = '{$_email}'";
			$data = mysqli_query($conn , $query);
     
			if ($data) { 
		 
		 echo '<script type="text/javascript">
		 swal("Password Reset Successfully :)", "Please Login.", "success").then(() => {
		 window.location.href="login.php";
		 });
		 
		 </script>';
		 
		  } else { 
		 echo '<script type="text/javascript">
		  swal("Something went wrong :(", "Go back and try again.", "error");
		</script>';
		   }
			
		  }

	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }
	?>
<section>
  <div class="row">
	<div class="col-md-12 login-bg">

	</div>
	<div class="container">
	  <div class="col-md-6 col-md-offset-3 login-form-block">
		<h2>Reset Password</h2>
				<form method="post">
			<input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">			  
			<div class="form-group">
				<input type="text" name="email" class="form-control login-input " placeholder="Your Registered Email" value="" id="email">
				<span class="error">
                  <?php echo $emailErr;?>
				</span>
				<div class="col-md-12 ">
                  <div style="display:none; color:red;" id="email-error"></div>
                </div>
            </div>
			<div class="form-group">
				<input type="password" name="password" class="form-control login-input " placeholder="Enter New Password" value="" id="password">
				<span class="error">
                  <?php echo $passErr;?>
				</span>
				<div class="col-md-12 ">
                  <div style="display:none; color:red;" id="password-error"></div>
                </div>
            </div>
            <div class="form-group">
				<input type="password" name="confirm_password" class="form-control login-input " placeholder="Confirm New Password" value="" id="cpassword">
				<span class="error">
                  <?php echo $cpassErr;?>
				</span>
				<div class="col-md-12 ">
                  <div style="display:none; color:red;" id="cpassword-error"></div>
                </div>
			</div>
			  <div class="form-group text-center">
				<input type="submit" class="btn btn-info login-form-btn" name="reset_pass" value="Reset">
			  </div>
		</form>
	  </div>
	
	</div>
  </div>
</section>



<?php include 'common/footer.php'; ?>
  </div>
  <script>
	$('#email').keyup(function (e) {
      var email = $('#email').val();

      let regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

      if (!email) {
        $('#email-error').text('*Email is required.');
        $('#email-error').addClass('error');
        $('#email-error').show();


      } else if (!regex.test(email)) {
        $('#email-error').text('You have entered an invalid email address!');
        $('#email-error').addClass('error');
        $('#email-error').show();


      }else {
        $('#email-error').text('');
        $('#email-error').removeClass('error');
        $('#email-error').hide();

      }


	});
	
 $('#password').keyup(function (e) {
      var password = $('#password').val();

      let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/;

      if (!password) {
        $('#password-error').text('*Password is required.');
        $('#password-error').addClass('error');
        $('#password-error').show();

      } else if (!regex.test(password)) {
        $('#password-error').text('Minimum 8 and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character!');
        $('#password-error').addClass('error');
        $('#password-error').show();

      } else {
        $('#password-error').text('');
        $('#password-error').removeClass('error');
        $('#password-error').hide();
      }


    });

    $('#cpassword').keyup(function (e) {
      var password = $('#password').val();
      var cpassword = $('#cpassword').val();


      if (!cpassword) {
        $('#cpassword-error').text('*Confirm password is required.');
        $('#cpassword-error').addClass('error');
        $('#cpassword-error').show();

      } else if (cpassword != password) {
        $('#cpassword-error').text('Password do not matched!');
        $('#cpassword-error').addClass('error');
        $('#cpassword-error').show();

      } else {
        $('#cpassword-error').text('');
        $('#cpassword-error').removeClass('error');
        $('#cpassword-error').hide();
      }


    });
</script>	  
</body>
