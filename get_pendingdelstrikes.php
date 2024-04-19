<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
$querypendingstrikesdel = "SELECT pending_strikes_del.id, name, date, validations_needed, validations_acc, reason FROM user INNER JOIN pending_strikes_del ON user.id = pending_strikes_del.userid WHERE pending_strikes_del.validated = '0' AND pending_strikes_del.deleted = '0';";

$resultpendingstrikesdel = mysqli_query($db, $querypendingstrikesdel);

$rows = mysqli_fetch_all($resultpendingstrikesdel, MYSQLI_ASSOC);
echo json_encode($rows);
?>
