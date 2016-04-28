<?php

 	header('Access-Control-Allow-Origin: *');
	
	$email 	= $_POST['email'];
	$lang = $_POST['lang'];

	include 'dbconfig.php';
	
	$exists = $conn->query("SELECT * FROM users WHERE email = '$email'");
	
    if($row = mysqli_fetch_assoc($exists) === NULL) {
	  echo 'No Email';
	}
	else {
	  $title = 'מתכנן הפארקים באורלנדו';
	  $dir = 'rtl';
	  $subject = 'הססמא שלך למתכנן הפארקים באורלנדו';
	  $name = 'מתכנן הפארקים באורלנדו';
	  $string = 'היי! <br> כנראה ששכחת את הססמא שלך. <br> הססמא החדשה שלך היא: ';
	  
	  if($lang == 'en') {
		$title = 'Orlando Park Planner';
		$dir = 'ltr';
		$subject = 'Your password for Orlando Park Planner';
		$name = 'Orlando Park Planner';
		$string = 'Hi! <br> It seems you forgot your password. <br> Your new password is: ';
	  }
  
	  $password = generateRandomString();
	  $passwordMD5 = md5($password);
	  
	  $conn->query("UPDATE users SET password = '$passwordMD5' WHERE email = '$email'");
	  
	  $email_body = '<html style="font-family: Arial, Helvetica, sans-serif">'; 
	  $email_body .= '<body dir="'.$dir.'" style="background-color: #DEE6EC">';
	  $email_body .= '<div style="background-color: #4D7B9D; padding: 12px;">';
	  $email_body .= '<span style="color: white; font-size: 20px; ">'.$title.'</span></div>';
	  $email_body .= '<div style="padding: 20px">';
	  $email_body .= '<div style="background-color: white; border-radius: 6px">';
	  $email_body .= '<div style="padding: 10px">';
	  $email_body .= '<p>'.$string.' '.$password.'</p>';
	  $email_body .= '</div></div></div></body></html>';
	  
	  require_once 'mailer/swift_required.php';
	  $transport = Swift_MailTransport::newInstance();
	  $mailer = Swift_Mailer::newInstance($transport);
	  $message = Swift_Message::newInstance($subject)
		  ->setFrom(array('info@parkplanner.co.il' => $name))
		  ->setTo(array($email))
		  ->setBody($email_body, 'text/html');	
	  $mailer->send($message);
	  
	  return true;
	}
	
	function generateRandomString($length = 6) {
	  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  $charactersLength = strlen($characters);
	  $randomString = '';
	  for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	  }
	  return $randomString;
	}		
?>