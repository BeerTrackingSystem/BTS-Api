<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
$query = "SELECT name, currentstrikes, last_pay FROM user INNER JOIN current_strikes ON user.id = current_strikes.userid WHERE user.veteran = 0;";

$result = mysqli_query($db, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($rows);
?>
