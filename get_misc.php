<?php
if (!defined('index_origin'))
{
	http_response_code(404);
	die();
}
?>
<?php
$query = "SELECT object, attribute, value FROM misc WHERE object = 'main_page' ;";

$result = mysqli_query($db, $query);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($rows);
?>
