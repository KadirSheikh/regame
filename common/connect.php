<?php 


$conn = mysqli_connect('localhost' , 'root' , '' , 'regame');

if ($conn) {
	//echo "connected";
}
else{
	die('Failed'.mysqli_error());
}

?>