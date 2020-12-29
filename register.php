<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<style>

.error{
  color:red;
}

</style>
<body>
<?php
error_reporting(0);
session_start();
$nameErr = $emailErr = $usernameErr = $mbnoErr = $dateErr = $passErr = $cpassErr = $checkboxErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed!";
    }else{
      $_name = $name;
      
    }
   
  }

  if (empty($_POST["user_name"])) {
    $usernameErr = "*Username is required";
  } else {
    $user_name = test_input($_POST["user_name"]);
    if (preg_match('/^[a-z0-9]{6,10}$/', $user_name)) {
      $usernameErr = "Username must contain atleast one uppercase, one lowercase and a number!";
      $query = "SELECT * FROM `users_tbl`";
      $data = mysqli_query($conn , $query);
      while($row = mysqli_fetch_assoc($data)){
          
        $db_username = $row['username'];
        $db_email = $row['email'];

        if($user_name ==  $db_username){
          $usernameErr = "Username already exists!";
        }

      }
    }else{

      $_username = $user_name;
     
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format!";
      while($row = mysqli_fetch_assoc($data)){
        $db_email = $row['email'];
        
        if($email ==  $db_email){
          $usernameErr = "This email is already in use!";
        }

      }
    }else{
      $_email = $email;
     
    }
  }

  if (empty($_POST["mb_no"])) {
    $mbnoErr = "*Mobile number is required";
  } else {
    $mb_no = test_input($_POST["mb_no"]);
    
  }

  if (empty($_POST["date"])) {
    $dateErr = "*Please select date";
  } else {
    $date = test_input($_POST["date"]);
    
  }

  if (empty($_POST["password"])) {
    $passErr = "*Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
      $passErr = 'Password must contain atleast one uppercase, one lowercase, a number and a special character!';
  }else{
    $psw = password_hash($password, PASSWORD_DEFAULT);
      
    }
  

  if (empty($_POST["confirm_password"])) {
    $cpassErr = "*Confirm password is required";
  } else if($password != $_POST["confirm_password"]){
    $cpassErr = "Password do not matched!";
   
  }


  if (empty($_POST["i_agree"])) {
    $checkboxErr = "Please check this";
  }

  $referal = $_POST['referral_code'];

  if(!empty($_name) && !empty($_username) && !empty($_email) && !empty($mb_no) && !empty($date) && !empty($psw) && !empty($_POST["i_agree"])){
    
    $_SESSION['name'] = $_name;
    $_SESSION['username'] = $_username;
    $_SESSION['email'] = $_email;
    $_SESSION['mbno'] = $mb_no;
    $_SESSION['date'] = $date;
    $_SESSION['pass'] = $psw;

    $query = "INSERT INTO `users_tbl`(`name`, `email`, `mobile`, `password`, `username`, `referal_code`, `created_date`) VALUES ('{$_name}' ,'{$_email}' ,'{$mb_no}' , '{$psw}' , '{$_username}' , '{$referal}' , '{$date}')";

    $data = mysqli_query($conn , $query);
   
      if ($data) { 
   
   echo '<script type="text/javascript">
   swal("Voter Registered Successfully :)", "Please Login.", "success").then(() => {
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
            <h2>CREATE YOUR ACCOUNT</h2>
          
            <form action="" method="POST">
              <div class="form-group">
                <input type="text" class="form-control login-input" name="name" placeholder="Enter Your Name" value="">
                <span class="error">  <?php echo $nameErr;?></span>
           
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="user_name" placeholder="Username" value="">
                
                <span class="error">  <?php echo $usernameErr;?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="email" placeholder="Enter Your Email" value="">
               
                <span class="error">  <?php echo $emailErr;?></span>
              </div>
              <div class="form-group">
                <input type="number" class="form-control login-input col-md-4" id="mobile-no" name="mb_no" value=""
                  placeholder="Enter Your Mobile Number" ><br>
                  
                  <span class="error">  <?php echo $mbnoErr;?></span>
                <!-- <button type="button" class="btn btn-info " id="verify-btn"
                  data-pd-popup-open="add-money">Verify</button> -->

              </div><br>
              <div class="form-group">
                <input type="date" class="form-control login-input" name="date" value="">
               
                <span class="error">  <?php echo $dateErr;?></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control login-input" name="password" placeholder="Enter Password">
               
                <span class="error">  <?php echo $passErr;?></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control login-input" name="confirm_password"
                  placeholder="Enter Confirm Password">
                  
                  <span class="error">  <?php echo $cpassErr;?></span>
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="referral_code" value=""
                  placeholder="Enter Referral Code (If Any)">
              </div>
              <div class="form-group">
                <input type="checkbox" class="form-control" name="i_agree" value="Yes"> <span
                  class="col-md-6 pull-right"> I Agree that I am 18 years or older</span>
                  
                  <span class="error">  <?php echo $checkboxErr;?></span>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-info login-form-btn" name="submit">Signup</button>
              </div>
            </form>
          </div>
          <div class="col-md-6 col-md-offset-3 login-form text-center">
            <p>Already Have An Account?</p>
            <a href="login.php" class="btn btn-warning signup-btn">Login</a>
          </div>
        </div>
      </div>
    </section>

    <div class="popup" data-pd-popup="add-money">
      <div class="popup-inner">
        <div class="bet-details">
          <h1>OTP</h1>
          <div class="alert alert-success" id="successMsg" style="display:none;"></div>
        </div>
        <form class="needs-validation form-inline" method="POST" action="https://bygame.in/dashboard/payment"
          id="add-money">
          <input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">
          <div class="">
            <input type="text" name="otp" placeholder="Enter OTP" id="otp-val" value="" class="form-control"
              autocomplete="off">
            <p style="display:none;color:red;" id="otp-error">Error</p>
            <input type="button" id="otp-submit" value="Submit" name="submit_btn" class="btn btn-primary form-control">
            <div style="color:red;display:none;" id="add_money-error">Error select</div>
          </div>
        </form>
        <a class="popup-close" data-pd-popup-close="add-money" href="#"> </a>
      </div>
    </div>


    <script src="front/js/core/script.js"></script>


    <?php include 'common/footer.php'; ?>
  </div>
</body>