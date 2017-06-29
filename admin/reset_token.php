<?php 
session_start();
include "../connection.php";	
include "functions/common_function.php";
$res = array();
if(isset($_POST['resetpassword']) && $_POST['resetpassword']=="true"){
	$user = new CommonFunction();
	$email = $_POST['email'];
	$res = $user->password_reset_notification($email, $mysqli);
	
	if($res=="notexits"){
	   $res['response'] = 0;
	}
	else if($res=="notentered"){
	   $res['response'] = 0;
	}
	else if($res=="sent"){
	   $res['response'] = 1;
	}	
}
echo json_encode($res);
?>