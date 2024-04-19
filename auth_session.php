<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
	if (!isset($_POST['sessionid']) || !isset($_POST['user']))
	{
		http_response_code(400);
		die();
	}
	else
	{
		$sessionid = $_POST['sessionid'];
		$user = $_POST['user'];
	}

	$querysession = "SELECT auth_sessions.sessionid FROM auth_sessions INNER JOIN user ON auth_sessions.userid = user.id WHERE user.name = ? AND auth_sessions.sessionid = ? AND auth_sessions.api = '1';";
        $prepsession = mysqli_prepare($db, $querysession);
        mysqli_stmt_bind_param ($prepsession, 'ss', $user, $sessionid);
        mysqli_stmt_execute($prepsession);
        $resultsession = mysqli_stmt_get_result($prepsession);

	$result_count = mysqli_num_rows($resultsession);
	
	if ($result_count != '1')
	{
		http_response_code(401);
		die();
	}
?>
