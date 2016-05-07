<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>

<body>
<?php 
	require_once('lib/nusoap.php');
	// Give it value at parameter
	$namespace = "http://localhost/b10/webservice/service.php";
	// Create objest
	$client = new soapclient($namespace);
	$client->decode_utf8 = false;
	// Call a function at web server and send parameters too
	$response = $client->call('MonAnTrongNgay');
	echo $response;

 ?>	
	
</body>
</html>