<?php

 	header('Access-Control-Allow-Origin: *');
	
	$email 	= $_POST['email'];
	$lang = $_POST['lang'];
	$string_to_html	= $_POST['stringHtmlSendto'];
	$parks_data = $_POST['parksDataForPhp'];
	$parks = explode(",", $parks_data);
	$today = date("Y-m-d"); 

	include 'dbconfig.php';
	
	$title = 'מתכנן הפארקים באורלנדו';
	$dir = 'rtl';
	$subject = 'המסלול שלך עם מתכנן הפארקים באורלנדו';
	$name = 'מתכנן הפארקים באורלנדו';
	
	if($lang == 'en') {
	  $title = 'Orlando Park Planner';
	  $dir = 'ltr';
	  $subject = 'Your schedule with Orlando Park Planner';
	  $name = 'Orlando Park Planner';
	}

	$conn->query("INSERT INTO sent_items (email, type, is_registered, date)
	      		VALUES ('$email', 'schedule' ,'0', '$today')");	

	$email_body = '<html style="font-family: Arial, Helvetica, sans-serif">'; 
	$email_body .= '<body dir="'.$dir.'" style="background-color: #DEE6EC">';
	$email_body .= '<div style="background-color: #4D7B9D; padding: 12px;">';
	$email_body .= '<span style="color: white; font-size: 20px; ">'.$title.'</span></div>';
	$email_body .= '<div style="padding: 20px">';
	$email_body .= '<div style="background-color: white; border-radius: 6px">';
	$email_body .= '<div style="padding: 10px">';
	$email_body .= $string_to_html;
	$email_body .= '</div></div></div></body></html>';
	
	require_once 'mailer/swift_required.php';
	$transport = Swift_MailTransport::newInstance();
	$mailer = Swift_Mailer::newInstance($transport);
	$message = Swift_Message::newInstance($subject)
		->setFrom(array('info@parkplanner.co.il' => $name))
		->setTo(array($email))
		->setBody($email_body, 'text/html');
		for($i = 0; ($i < sizeof($parks) - 1); $i++) {
		  $parkPath  =  '../images/maps/';
		  $parkPath .= $parks[$i];
		  $parkPath .= ' Map';
		  $parkPath .= '.pdf';
		  $message->attach(Swift_Attachment::fromPath($parkPath)
		  ->setFilename($parks[$i] . '.pdf'));
		}		
	$mailer->send($message);
	
	return true;
?>