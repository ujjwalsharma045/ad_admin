<?php 
session_start();
include "../connection.php";	
include "helpers/UserHelper.php";
$error = array();
$user = new UserHelper();

if($user->validatesession()){
	header('Location:index.php');
	exit;
}

$access_error = 0;
if(!isset($_REQUEST['token']) || $_REQUEST['token']==""){
   $access_error = 1;
}
else {
   $token_response = $user->check_token(array('token'=>$_REQUEST['token']), $mysqli);
   //echo $token_response;
   
   if($token_response=="notexists"){
	   $access_error = 1;
   }
   else if($token_response=="expired"){
	   $access_error = 1;
   }
}    
 
if($access_error==0){
	if(isset($_POST['submit'])){		
			$form_error = array();
			if(!isset($_POST['newpassword']) || trim($_POST['newpassword'])==""){
				$form_error['newpassword'] = "Enter Password";
			}
			
			if(!isset($_POST['confirmpassword']) || trim($_POST['confirmpassword'])==""){
				$form_error['confirmpassword'] = "Enter Confirm Password";
			}
			
			if(isset($_POST['confirmpassword']) && isset($_POST['newpassword']) && $_POST['confirmpassword']!=$_POST['newpassword']){
				$form_error['confirmpassword'] = "Password should match with Confirm Password";
			}
			
			if(count($form_error)<=0){		
				$user_detail = array(
					'user_id'=>$token_response['user_id'],
					'password'=>$_POST['confirmpassword']
				); 			
				
				$res = $user->resetpassword($user_detail, $mysqli);
				if($res=="succed"){				   
				   $user->update_token(array('token'=>$_REQUEST['token']) , $mysqli);
				   $_SESSION['flash']['success'] = 'Password updated successfully';
				   header("Location:login.php");
				   exit;
				}
				else {					
					$error[0] ='could not reset';
				}
			}
    }
}
?>

<?php
  include "views/layouts/admin_loginheader.php";	
?>

<!-- Content Wrapper. Contains page content -->
<style type="text/css">
	.error{
		color:red;
	}
</style>

<div class="">
  <!-- Main content -->
  <?php 
   if($access_error==0){   	
	  ?>
	  <section class="content-header">
		  <h1>
			Reset Password 
		  </h1>      
	  </section>
	  <?php 
   }
  ?>
  <section class="content">
       <?php 
       if($access_error==0){   	
         ?>	   
		 <form role="form" method="post">
			   <div class="box-body">
					<div class="form-group">
					  <label for="exampleInputEmail1">New Password</label>
					  <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password">
					  <span class="error">
						 <?php echo  isset($form_error['newpassword'])? $form_error['newpassword']:""; ?>
					  </span>
					</div>
					
					<div class="form-group">
					  <label for="exampleInputPassword1">Confirm Password</label>
					  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
					  <span class="error">
						 <?php echo  isset($form_error['confirmpassword'])? $form_error['confirmpassword']:""; ?>
					  </span>
					  
					  <span class="error">
						 <?php echo  (isset($error[0]))? $error[0]:""; ?>
					  </span>
					</div>                 				
			   </div>
			   <!-- /.box-body -->
			   <div class="box-body">
				 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
			   </div>
		 </form>  
         <?php 
       }
	   else {
		   ?>
		   <h2>Link is expired or not available in system</h2>
		   <?php 
	   }
       ?>    
    <!-- /.row -->      
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
  include "views/layouts/admin_loginfooter.php";	
?>