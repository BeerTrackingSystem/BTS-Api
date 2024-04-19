<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
	if (!isset($_POST['sessionid']))
	{
		http_response_code(400);
		die();
	}
	else
	{
		$sessionid = $_POST['sessionid'];
	}

	$querydelsession = "DELETE FROM auth_sessions WHERE sessionid = ?;";
        $prepdelsession = mysqli_prepare($db, $querydelsession);
        mysqli_stmt_bind_param ($prepdelsession, 's', $sessionid);
        mysqli_stmt_execute($prepdelsession);
        $resultdelsession = mysqli_stmt_get_result($prepdelsession);

	$querysession = "SELECT id FROM auth_sessions WHERE sessionid = ?;";
        $prepsession = mysqli_prepare($db, $querysession);
        mysqli_stmt_bind_param ($prepsession, 's', $sessionid);
        mysqli_stmt_execute($prepsession);
        $resultsession = mysqli_stmt_get_result($prepsession);
	$result_count = mysqli_num_rows($resultsession);
	
	if ($result_count != '0')
	{
		//http_response_code(500);
		//die();
	}
?>
