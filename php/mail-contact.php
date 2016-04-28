<?php

 	header('Access-Control-Allow-Origin: *');
	
	$email 	= $_POST['email'];
	$contact_content = $_POST['contact_content'];
	$name 	= $_POST['name'];
		
	$email_body = '<html style="font-family: Arial, Helvetica, sans-serif"><body dir="rtl">';
	$email_body .= '<p>היי! התקבלה פנייה מלקוח של מתכנן הפארקים באורלנדו</p>';
	$email_body .= '<p>שם: ' .$name. '</p>';
	$email_body .= '<p>אימייל: ' .$email. '</p>';
	$email_body .= '<p>תוכן הפנייה: ' .$contact_content. '</p>';
	$email_body .= '</body></html>';
	
	require_once 'mailer/swift_required.php';
	$transport = Swift_MailTransport::newInstance();
	$mailer = Swift_Mailer::newInstance($transport);
	$message = Swift_Message::newInstance('פניית לקוח ממתכנן הפארקים באורלנדו')
		->setFrom(array($email => $name))
		->setTo(array('nathan.bru@gmail.com', 'info@parkplanner.co.il'))
		->setBody($email_body, 'text/html');
	$mailer->send($message);
	
	return true;
?>