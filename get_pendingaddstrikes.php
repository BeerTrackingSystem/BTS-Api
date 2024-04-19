<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
$querypendingstrikesadd = "SELECT pending_strikes_add.id, name, date, validations_needed, validations_acc, reason FROM user INNER JOIN pending_strikes_add ON user.id = pending_strikes_add.userid WHERE pending_strikes_add.validated = '0' AND pending_strikes_add.deleted = '0';";

$resultpendingstrikesadd = mysqli_query($db, $querypendingstrikesadd);

$rows = mysqli_fetch_all($resultpendingstrikesadd, MYSQLI_ASSOC);
echo json_encode($rows);
?>
