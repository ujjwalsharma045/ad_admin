<?php
class UserHelper {
	public function __construct(){
		
	}
	
	function autheticateuser($data = array(), $mysqli){
		$sql = "select U.username, U.email, U.id, U.status from users as U where U.username = '".$mysqli->real_escape_string($data['username'])."' and U.password = '".$mysqli->real_escape_string(md5($data['password']))."' limit 1"; 		
		
		$rs = $mysqli->query($sql);
		
		//echo mysqli_fetch_array($rs,MYSQLI_ASSOC);
		if($rs->num_rows > 0){
			while($detail = $rs->fetch_assoc()){
				if($detail['status']!='A'){
					return "inactive";
				}
				else {
					return $detail;
				}
			}
		}
        else {
			return "notexits";
		}		
    }
	
	function addusersession($data = array()){
		$_SESSION['user']['id'] = $data['id'];		
		$_SESSION['user']['username'] = $data['username'];		
		$_SESSION['user']['email'] = $data['email'];		
    }
	
	function password_reset_notification($data = array(), $mysqli){
		$sql = "select  U.email, U.id, U.username from users as U where U.email = '".$mysqli->real_escape_string($data['email'])."' limit 1";
		$rs = $mysqli->query($sql);		
		//echo mysqli_fetch_array($rs,MYSQLI_ASSOC);
		if($rs->num_rows>0){
			while($detail = $rs->fetch_assoc()){
				$date = date('Y-m-d h:i:s');
				$token = base64_encode($detail['id'].time());
				$sql = "INSERT INTO reset_credentials(user_id, token, status , created)
                VALUES ('".$mysqli->real_escape_string($detail['id'])."', '".$mysqli->real_escape_string($token)."', 'A', '".$mysqli->real_escape_string($date)."')";
				if($mysqli->query($sql)===true){
					$message_content = $this->mailtemplate();
					
					$find = array("{{username}}","{{link}}");
                    $replace = array($detail['username'] , 'http://192.168.4.29/fbapi/admin/resetpassword.php?token='.$token);
					$message_content = str_replace($find,$replace,$message_content);
					
					$mailer = initiate_mail();					
					$mail_detail = array(
					   'to'=>$data['email'],
					   'to_name'=>$data['email'],
					   'from'=>'dstestteam@gmail.com',
					   'subject'=>'RESET YOUR PASSWORD',
					   'message'=>$message_content
					);
					send_mail($mail_detail , $mailer);
					return 'sent';
				}
                else {
					return "notentered";
				} 				
			}
		}
        else {
			return "notexits";
		}		
    }

    function check_token($data = array(), $mysqli){
		$sql = "select RC.user_id, RC.token,  RC.status from reset_credentials as RC where RC.token = '".$mysqli->real_escape_string($data['token'])."' limit 1"; 		
		
		$rs = $mysqli->query($sql);
		
		//echo mysqli_fetch_array($rs,MYSQLI_ASSOC);
		if($rs->num_rows > 0){
			while($detail = $rs->fetch_assoc()){
				if($detail['status']!='A'){
					return "expired";
				}
				else {
					return $detail;
				}
			}
		}
        else {
			return "notexists";
		}		
    }

    function update_token($data = array(), $mysqli){
		$sql = "update reset_credentials set status = 'E', modified='".$mysqli->real_escape_string(date('Y-m-d h:i:s'))."'  where reset_credentials.token = '".$mysqli->real_escape_string($data['token'])."' limit 1"; 						
		$rs = $mysqli->query($sql);				
		return ($rs)? "updated":"notexits";
    }

    function resetpassword($data = array(), $mysqli){
		$sql = "update users set 
		  password = '".$mysqli->real_escape_string(md5($data['password']))."', 
		  modified='".$mysqli->real_escape_string(date('Y-m-d h:i:s'))."' where users.id = '".$mysqli->real_escape_string($data['user_id'])."'";
		  
		$rs = $mysqli->query($sql);				
		return ($rs)? "succed":"failed";
    }	

    function validatesession(){
		if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
			return false;
		}
		else {
			if(isset($_SESSION['user']['id']) && trim($_SESSION['user']['id'])!=""){
				return true;
			}
			else {
				return false;
			}
		}
	}	
	
	function mailtemplate(){
		if(file_exists('views/templates/passwordreset.html')){
			$contents = file_get_contents('views/templates/passwordreset.html');
			return $contents;
		}
		else {
			return false;
		}
	}
}	
?>