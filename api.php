<?php
header("Content-Type:application/json");
define('index_origin', true);

include('../db.inc.php');

#Auth
include('auth_api.php');

#CallType
switch ($_POST['calltype']) {
	case 'auth':
		goto auth;
		break;
	case 'get':
		goto get;
		break;
	case 'set':
		goto set;
		break;
	default:
		http_response_code(400);
                die();	
}

#Calls
auth:
switch ($_POST['callitem']) {
	case 'login':
		include ('auth_login.php');
		die();
		break;
	case 'logoff':
		include ('auth_logoff.php');
		die();
		break;
	default:
		http_response_code(400);
                die();	
}

get:
switch ($_POST['callitem']) {
	case 'allusers':
		include ('get_allusers.php');
		die();
		break;
	case 'sessionstate':
		include ('get_sessionstate.php');
		die();
		break;
	case 'currentstock':
		include ('get_currentstock.php');
		die();
		break;
	case 'currentstrikes':
		include ('get_currentstrikes.php');
		die();
		break;
	case 'misc':
		include ('get_misc.php');
		die();
		break;
	case 'motd':
		include ('get_motd.php');
		die();
		break;
	case 'pendingaddstrikes':
		include ('get_pendingaddstrikes.php');
		die();
		break;
	case 'pendingdelstrikes':
		include ('get_pendingdelstrikes.php');
		die();
		break;
	default:
		http_response_code(400);
                die();	
}

set:
include('auth_session.php');
switch ($_POST['callitem']) {
	case 'currentstock':
		include ('set_currentstock.php');
		die();
		break;
	case 'addstrike':
		include ('set_addstrike.php');
		die();
		break;
	case 'delstrike':
		include ('set_delstrike.php');
		die();
		break;
	default:
		http_response_code(400);
                die();	
}
?>
