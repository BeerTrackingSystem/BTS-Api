<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
	if (!isset($_POST['apikey']))
	{
		http_response_code(400);
		die();
	}
	else
	{
		$apikey = $_POST['apikey'];
	}

	$query = "SELECT id FROM api_keys WHERE apikey = '$apikey';";
	$result = mysqli_query($db, $query);
	$result_count = mysqli_num_rows($result);

	if ($result_count == '1')
	{
		$isauthorized = true;
	}
	else
	{
		http_response_code(401);
		die();
	}
?>
