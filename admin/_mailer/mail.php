<?php
include_once('phpmailer/class.phpmailer.php');

function initiate_mail(){
    $mailer = new PHPMailer();
    $mailer->IsMail();    
    
        $mailer->IsSMTP(); 
       // $mailer->SMTPDebug = 2;
        $mailer->Port = 25;	
        //$mailer->SMTPSecure = "ssl";
        $mailer->SMTPAuth = true;
        $mailer->Host = 'mail.dotsquares.com'; 
        $mailer->Username = 'wwwsmtp@dotsquares.com'; 
        $mailer->Password = 'dsmtp909#';
    
	
    return $mailer;
}

function send_mail($mail_details = array(), $mailer){
	
    if(isset($mail_details['to']) && isset($mail_details['from']) && isset($mail_details['subject']) && isset($mail_details['message'])){		  
		$mailer->IsHTML(true);  
        $to_name = isset($mail_details['to_name'])?$mail_details['to_name']:$mail_details['to'];
        $mailer->AddAddress($mail_details['to'], $to_name);
        
        $mailer->Subject = $mail_details['subject'];
        	
       // $mailer->SetFrom('noreply@dnsweepstakes.com', 'NYDailyNews Contests');
		//$mailer->SetFrom('contests@nydn.com', 'Daily News, L.P.');
		
        //$mailer->FromName="NYDN Contest";
        $mailer->SetFrom($mail_details['from']);
		//$mailer->FromName=isset($mail_details['from_name'])?$mail_details['from_name']:"Universal";
       // $mailer->addCustomHeader('Return-Path: NYDailyNews Contests <noreply@dnsweepstakes.com>');
        if(isset($mail_details['attachments'])){
            $attachments = $mail_details['attachments'];
            foreach($attachments as $key=>$value){
              $mailer->AddAttachment($value);  
            }
        }
	
	    $mailer->AddReplyTo($mail_details['from']);
	
	    $message_details = $mail_details['message'];	
	    $mailer->MsgHTML($message_details);
	
	    return ($mailer->Send())?true:false;
   }
   
    return false;
}



