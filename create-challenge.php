<?php include'common/connect.php';?>
<?php 

$userid = $_POST["userid"];
$username=$_POST["username"];
$amount = $_POST["amount"];
$is_set=$_POST["is_set"];

$create = "INSERT INTO `set_challenge`(`user_id`, `user_name`, `amount`, `is_set`) VALUES ($userid,'{$username}',$amount,$is_set)";
$data =  mysqli_query($conn , $create);
if (!$data) {  
    die("Failed".mysqli_error($conn));
        }

?>