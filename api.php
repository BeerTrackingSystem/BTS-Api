<?php
header("Content-Type:application/json");
define('index_origin', true);

include('../db.inc.php');

#Auth
include('auth_api.php');
include('auth_user.php');

#CallType
switch ($_POST['calltype']) {
	case 'auth':
                die();	
		break;
	case 'get':
		goto get;
		break;
	default:
		http_response_code(400);
                die();	
}

#Calls
get:
switch ($_POST['callitem']) {
	case 'currentstock':
		include ('get_currentstock.php');
		die();
		break;
	default:
		http_response_code(400);
                die();	
}
?>
