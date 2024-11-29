<?php 

	require('Textlocal.class.php');
	$Textlocal = new Textlocal(false, false, 'your apiKey');
	$numbers = array(918123456789);
	$sender = 'TXTLCL';
	$message = 'This is your message';
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>