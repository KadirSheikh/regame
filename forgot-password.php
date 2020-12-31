<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<body>
<?php 
  error_reporting(0);
  session_start();
if(isset($_POST['submit_otp'])){
  
  if (empty($_POST["otp"])) {
    $otpErr = "*OTP is required";
  }else{
    $otp_input = test_input($_POST['otp']);
  }


  $verify_otp = mysqli_query($conn,"SELECT * FROM `otp_tbl` WHERE `otp`='$otp_input' AND `is_expired`='0' AND `requested_by`='$_SESSION[email]'");
  if(mysqli_num_rows($verify_otp)>0){
    $expire_otp = mysqli_query($conn,"UPDATE `otp_tbl` SET `is_expired`='1' WHERE `otp`='$otp_input' AND `requested_by`='$_SESSION[email]'");
    if($expire_otp){

     echo '<script type="text/javascript">
     swal("OTP Verification Successful :)", "Reset your password.", "success").then(() => {
     window.location.href="reset.php";
     });
     
     </script>';
     
      
    }
  }else { 
    echo '<script type="text/javascript">
     swal("Invalid OTP or empty OTP :(", "Go back and try again.", "error").then(() => {
      var modal = document.getElementById("myModal");
      var btn = document.getElementById("myBtn");
      var span = document.getElementsByClassName("close")[0];
      
      
        modal.style.display = "block";
      
      span.onclick = function() {
        modal.style.display = "none";
      }
      });

   </script>';
      }
 

}



?>
<div id="myModal" class="modal">
    <div class="modal-content">

      <span class="close">&times;</span>
      <div class="bet-details">
        <h1 style="text-align:center;">OTP</h1>
        
      </div>
      <center>
        <form class="needs-validation form-inline" method="POST" action="">
          <input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">
          <div class="">
            <input type="text" name="otp" placeholder="Enter OTP" id="otp-val" value="" class="form-control"
              autocomplete="off">
            <div class="col-md-12 ">
                <span class="error">
                  <?php echo $otpErr;?>
                </span>
            </div>
            <div class="col-md-12 ">
              <div style="display:none; color:red;" id="otp-error"></div>
            </div>
            <input type="submit" id="otp-submit" value="Submit" name="submit_otp" class="btn btn-primary form-control">

      </center>
        </form>
      </div>

      <br>
    </div>

  </div>
	<?php 
	 use PHPMailer\PHPMailer\PHPMailer;
	 use PHPMailer\PHPMailer\Exception;
	 
	 require_once "vendor/autoload.php";
	$emailErr="";
	if (isset($_POST['send_otp'])) {
		
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
	

		  if(!empty($_email)){
			$_SESSION[email] = $_email;

			$otp = mt_rand(100000,999999);
			$insert_otp = mysqli_query($conn,"INSERT INTO `otp_tbl`(`requested_by`,`otp`, `is_expired`) VALUES ('{$_email}','$otp','0')");
		
			if (!$insert_otp) {  
			  die("Failed".mysqli_error($conn));
				  }
		  
	  
			if($insert_otp){
				$mail = new PHPMailer(true);

// $mail->SMTPDebug = 3;                               
// $mail->isSMTP();                                     
// $mail->Host = "";
// $mail->SMTPAuth = true;                               
// $mail->Username = "";                 
// $mail->Password = "";                           
// $mail->SMTPSecure = "tls";                           
// $mail->Port = 587;

$mail->From = "regame@gmail.com";
$mail->FromName = "Re Game";

$mail->addAddress($_SESSION['email'], $_SESSION['name']);

$mail->isHTML(true);

$mail->Subject = "One Time Password (OTP) Confirmation";
$mail->Body = "<i>Thank you for register at Re Game</i>";
$mail->AltBody = "Please verify your OTP, your OTP is ";
$mail->AltBody = "<h2>.$otp.</h2>";
try {
	if($mail->send()){
        
    echo '<script type="text/javascript">
    swal("OTP Confirmation", "OTP Confirmation mail is sent to your email address.", "success").then(() => {
     var modal = document.getElementById("myModal");
     var btn = document.getElementById("myBtn");
     var span = document.getElementsByClassName("close")[0];
     
     
       modal.style.display = "block";
     
     span.onclick = function() {
       modal.style.display = "none";
     }
     });

  </script>';
	}
 
} catch (Exception $e) {
  echo '<script type="text/javascript">
  swal("Something went wrong :(", "Go back and try again.", "error");
</script>';
   
}
	
				
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
  <div class="main">
  <?php include 'common/nav.php'; ?>
    
<section>
  <div class="row">
	<div class="col-md-12 login-bg">

	</div>
	<div class="container">
	  <div class="col-md-6 col-md-offset-3 login-form-block">
		<h2>Forgot Password</h2>
		<form action="" method="post">
			<!-- <input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">			   -->
			<div class="form-group">
				<input type="text" name="email" class="form-control login-input " placeholder="Enter Your Email" value="" id="email">
				<span class="error">
                  <?php echo $emailErr;?>
				</span>
				<div class="col-md-12 ">
                  <div style="display:none; color:red;" id="email-error"></div>
                </div>
			</div>
			  <div class="form-group text-center">
				<input type="submit" class="btn btn-info login-form-btn" name="send_otp" value="Send OTP">
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
  </script>
</body>
