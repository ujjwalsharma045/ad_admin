<?php
if(isset($_SESSION['flash']['success'])){
	?>
    <h4 style="color:green">
	  <?php 
	    echo $_SESSION['flash']['success']; 
		unset($_SESSION['flash']['success']);
	  ?>
	</h4>	
	<?php
}
?>

<?php 
if(isset($_SESSION['flash']['error'])){
	?>
	<h4 style="color:red">
	  <?php 
	    echo $_SESSION['flash']['error']; 
		unset($_SESSION['flash']['error']);
	  ?>
	</h4>	
	<?php 
} 
?>