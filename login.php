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
    $usernameErr = $passErr = "";

if(isset($_POST['submit'])) {

   if (empty($_POST["user_name"])) {
    $usernameErr = "*Username is required";
  } else {
      $_username = test_input($_POST["user_name"]);
      
    }
  

  if (empty($_POST["password"])) {
    $passErr = "*Password is required";
  } else {
      $psw = test_input($_POST["password"]);
    }
  

  
    $query = "SELECT * FROM `users_tbl` WHERE username = '{$_username}'";
    $data = mysqli_query($conn , $query);
   $num_rows = mysqli_num_rows($data);
   if ($num_rows == 1) {
     $_SESSION['loggedin'] = true;
     $_SESSION['username'] = $_username;
 }
   if (!$data) {  
    die("Failed".mysqli_error($conn));
        }

        while($row = mysqli_fetch_assoc($data)){
          
          $db_username = $row['username'];
          $db_psw = $row['password'];

        }
        
  
        $verify = password_verify($psw, $db_psw);
if($_username === $db_username){
  if($verify){
    echo '<script type="text/javascript">
    swal("Login Successful :)", "Please Vote.", "success").then(() => {
      window.location.href="dashboard.php";
    });
    
    </script>';


   }else{
    echo '<script type="text/javascript">
    swal("Login Failed :(", "Invalid Credentials.", "error");
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

   ?>
  <div class="main">
  <?php include 'common/nav.php'; ?>

    <section>
      <div class="row">
        <div class="col-md-12 login-bg">

        </div>
        <div class="container">
          <div class="col-md-6 col-md-offset-3 login-form-block">
            <h2>Login To Continue</h2>

            <form action="" method="post">
              <input type="hidden" name="_token" value="DDYkFFNN19cpMaMyCF3yHLNIzWqSgkOPc1BEfNlT">
              <div class="form-group">
                <input type="text" name="user_name" class="form-control login-input " placeholder="Enter Username"
                  value="" >
                  <span class="error">  <?php echo $usernameErr;?></span>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control login-input " placeholder="Enter Password"
                  >
                  <span class="error">  <?php echo $passErr;?></span>
              </div>
              <div class="form-group">
                <a href="forgot-password.php">Forgot Password</a>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-info login-form-btn" name="submit">Login</button>
              </div>
            </form>
          </div>
          <div class="col-md-6 col-md-offset-3 login-form text-center">
            <p>Don't Have An Account, Create New</p>
            <a href="register.php" class="btn btn-warning signup-btn">Signup</a>
          </div>
        </div>
      </div>
    </section>



    <?php include 'common/footer.php'; ?>
  </div>
</body>
