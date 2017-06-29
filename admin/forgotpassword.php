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
	if(!isset($_POST['email']) || trim($_POST['email'])==""){
		$form_error['email'] = "Email can not be left blank";
	}
	
	if(count($form_error)<=0){
		
		$data['email'] = $_POST['email'];
		$res = $user->password_reset_notification($data, $mysqli);
		
		if($res=="notexits"){
		   $error['0'] = 'Email does not exist in system';
		}
		else if($res=="notentered"){
		   $error['0'] = 'An error occured, try again';
		}
		else if($res=="sent"){		   
		   $_SESSION['flash']['success'] = 'Email sent successfully';
		   header("Location:login.php");
		   exit;
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
  <section class="content-header">
      <h1>
        Password Recovery
      </h1>   
      <?php
        include "views/elements/flashmessage.php";	
      ?>	  
  </section>
  <section class="content">	
    <form role="form" method="post">
		   <div class="box-body">
				<div class="form-group">
				  <label for="exampleInputEmail1">Email</label>
				  <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="">
				  <span class="error">
				     <?php echo isset($form_error['email'])? $form_error['email']:""; ?>
				  </span>
				  
				  <span class="error">
				     <?php echo isset($error[0])? $error[0]:""; ?>
				  </span>
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