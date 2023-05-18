<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
	function generateRandomString($length = 50) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!-+.';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                return $randomString;
                }
?>
<?php
	if (!isset($_POST['loginuser']) || !isset($_POST['loginpassword']))
	{
		http_response_code(400);
		die();
	}
	else
	{
		$username = $_POST['loginuser'];
		$password = $_POST['loginpassword'];
	}

	$queryhash = "SELECT password FROM user WHERE name = ?;";
        $prephash = mysqli_prepare($db, $queryhash);
        mysqli_stmt_bind_param ($prephash, 's', $username);
        mysqli_stmt_execute($prephash);
        $resulthash = mysqli_stmt_get_result($prephash);

        while ($row = $resulthash->fetch_assoc()) {
                $hash = $row['password'];
        }

	if (password_verify($password,"$hash"))
	{
		$querypresentsession = "SELECT sessionid FROM auth_sessions INNER JOIN user ON auth_sessions.userid = user.id WHERE user.name = ? AND api = '1' LIMIT 1;";
      		$preppresentsession = mysqli_prepare($db, $querypresentsession);
	        mysqli_stmt_bind_param ($preppresentsession, 's', $username);
        	mysqli_stmt_execute($preppresentsession);
	        $resultpresentsession = mysqli_stmt_get_result($preppresentsession);

		$resultpresentsession_count = mysqli_num_rows($resultpresentsession);
		if ($resultpresentsession_count == 1)
		{
			$presentsessionrow = mysqli_fetch_array($resultpresentsession);
			$presentsession = $presentsessionrow['sessionid'];
			#echo json_encode($presentsession);
		}
		else
		{
			$sessionid = generateRandomString();

	        	$queryaddsession = "INSERT INTO auth_sessions (userid, sessionid, create_date, api) SELECT user.id, ?, current_timestamp(), '1' FROM user WHERE user.name = ?;";
		        $prepaddsession = mysqli_prepare($db, $queryaddsession);
	        	mysqli_stmt_bind_param ($prepaddsession, 'ss', $sessionid, $username);
	        	mysqli_stmt_execute($prepaddsession);
		        $resultaddsession = mysqli_stmt_get_result($prepaddsession);

			#echo json_encode($sessionid);
        	}
	}
	else
        {
			http_response_code(401);
	                die();
	}
?>
