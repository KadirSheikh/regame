<?php include 'common/header.php'; ?>
<?php include 'common/connect.php'; ?>
<style>
  .error {
    color: red;
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
      $_name = test_input($_POST["name"]);
      
    }
   
  }
      
  
  if (empty($_POST["user_name"])) {
    $usernameErr = "*Username is required";
  } else if(!empty($_POST["user_name"])){
    $user_name = test_input($_POST["user_name"]);
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $user_name)) {
      $usernameErr = "Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character!";
    }else{

      $_username = test_input($_POST["user_name"]);
      
     
    } 
  }
     

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
    $_SESSION['referal'] = $referal;

    $query = "INSERT INTO `users_tbl`(`name`, `email`, `mobile`, `password`, `username`, `referal_code`, `create_date`) VALUES ('{$_name}' ,'{$_email}' ,'{$mb_no}' , '{$psw}' , '{$_username}' , '{$referal}' , '{$date}')";

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
                <input type="text" class="form-control login-input" name="name" placeholder="Enter Your Name" value="" id="name">
                <span class="error">
                  <?php echo $nameErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="name-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="user_name" placeholder="Username" value="" id="username">

                <span class="error">
                  <?php echo $usernameErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="username-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="email" placeholder="Enter Your Email"
                  value="" id="email">

                <span class="error">
                  <?php echo $emailErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="email-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control login-input col-md-4" name="mb_no" value=""
                  placeholder="Enter Your Mobile Number" id="mobile"><br>

                <span class="error">
                  <?php echo $mbnoErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="mobile-error"></div>
                </div>
                <!-- <button type="button" class="btn btn-info " id="verify-btn"
                  data-pd-popup-open="add-money">Verify</button> -->

              </div><br>
              <div class="form-group">
                <input type="date" class="form-control login-input" name="date" value="" id="date">

                <span class="error">
                  <?php echo $dateErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="date-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control login-input" name="password" placeholder="Enter Password" id="password">

                <span class="error">
                  <?php echo $passErr;?>
                </span>
                <div class="col-md-12">
                  <div style="display:none; color:red;" id="password-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="password" class="form-control login-input" name="confirm_password"
                  placeholder="Enter Confirm Password" id="cpassword">

                <span class="error">
                  <?php echo $cpassErr;?>
                </span>
                <div class="col-md-12 ">
                  <div style="display:none; color:red;" id="cpassword-error"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control login-input" name="referral_code" value=""
                  placeholder="Enter Referral Code (If Any)">
              </div>
              <div class="form-group">
                <input type="checkbox" class="form-control" name="i_agree" value="Yes"> <span
                  class="col-md-6 pull-right"> I Agree that I am 18 years or older</span>

                <span class="error">
                  <?php echo $checkboxErr;?>
                </span>
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
  <script>

    $('#name').keyup(function (e) {
      var name = $('#name').val();
 
      let regex = /^[a-zA-Z-' ]*$/;

      if (!name) {
        $('#name-error').text('*Name is required.');
        $('#name-error').addClass('error');
        $('#name-error').show();
        
      } else if (!regex.test(name)) {
        $('#name-error').text('Only letters and white space allowed!');
        $('#name-error').addClass('error');
        $('#name-error').show();
       
      } else {
        $('#name-error').text('');
        $('#name-error').removeClass('error');
        $('#name-error').hide();
      }


    });

    $('#username').keyup(function (e) {
      var username = $('#username').val();
 
      let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

      if (!username) {
        $('#username-error').text('*Username is required.');
        $('#username-error').addClass('error');
        $('#username-error').show();
        
      } else if (!regex.test(username)) {
        $('#username-error').text('Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character!');
        $('#username-error').addClass('error');
        $('#username-error').show();
       
      } else {
        $('#username-error').text('');
        $('#username-error').removeClass('error');
        $('#username-error').hide();
      }


    });

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
       
      } else {
        $('#email-error').text('');
        $('#email-error').removeClass('error');
        $('#email-error').hide();
      }


    });

    $('#mobile').keyup(function (e) {
      var mobile = $('#mobile').val();

      if (!mobile) {
        $('#mobile-error').text('*Mobile is required.');
        $('#mobile-error').addClass('error');
        $('#mobile-error').show();
        
      }else {
        $('#mobile-error').text('');
        $('#mobile-error').removeClass('error');
        $('#mobile-error').hide();
      }


    });

    
    $('#date').keyup(function (e) {
      var date = $('#date').val();

      if (!date) {
        $('#date-error').text('*Date is required.');
        $('#date-error').addClass('error');
        $('#date-error').show();
        
      }else {
        $('#date-error').text('');
        $('#date-error').removeClass('error');
        $('#date-error').hide();
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