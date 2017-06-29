<?php 
session_start();
include "../connection.php";	
include "helpers/UserHelper.php";
include "_mailer/mail.php";
$user = new UserHelper();
if($user->validatesession()){
	header('Location:index.php');
	exit;
}
$error = array();
if(isset($_POST['submit'])){
	
	$form_error = array();
	if(!isset($_POST['username']) || trim($_POST['username'])==""){
		$form_error['username'] = "Enter Username";
	}
	
	if(!isset($_POST['password']) || trim($_POST['password'])==""){
		$form_error['password'] = "Enter Password";
	}
	
	if(count($form_error)<=0){
		
		$res = $user->autheticateuser($_POST, $mysqli);
		if($res=="notexits"){
		   $error[0] = "Invalid Username or Password";		
		}
		else if($res=="inactive"){
		   $error[0] = "User is not active.";			
		}
		else if(is_array($res)){
		   $user->addusersession($res);
		   header("Location:index.php");
		   exit;
		}
	}
}
?>

<?php
  include "views/layouts/admin_loginheader.php";	
?>
<!-- Content Wrapper. Contains page content -->

<div style="height:100%">
  <!-- Main content -->  
  <section class="content-header">
      <h1>
        Sign-In
      </h1>      
	  <?php
       include "views/elements/flashmessage.php";	
      ?>
  </section>
  <section class="content">	
       <form role="form" method="post">
		   <div class="box-body">
				<div class="form-group">
				  <label for="exampleInputEmail1">User name</label>
				  <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
				  <span class="error">
				     <?php echo  isset($form_error['username'])? $form_error['username']:""; ?>
				  </span>
				</div>
				
				<div class="form-group">
				  <label for="exampleInputPassword1">Password</label>
				  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  <span class="error">
				     <?php echo  isset($form_error['password'])? $form_error['password']:""; ?>
				  </span>
				  
				  <span class="error">
				     <?php echo  (isset($error[0]))? $error[0]:""; ?>
				  </span>
				</div> 
                
				<div class="checkbox">
				  <!-- <label>
					<input type="checkbox"> Keep me loggen in
				  </label> -->
				  <a href="forgotpassword.php">Forgot Password</a>
				</div>
		   </div>
		   <!-- /.box-body -->
		   <div class="box-body">
			 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		   </div>
    </form>      
    <!-- /.row -->      
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
  include "views/layouts/admin_loginfooter.php";	
?>