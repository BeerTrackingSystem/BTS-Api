<?php
if (!defined('index_origin'))
{
        http_response_code(404);
        die();
}
?>
<?php
 if (!isset($_POST['value']))
        {
                http_response_code(400);
                die();
        }
        else
        {
		$newstock = $_POST['value'];
        }


	$querysetstock = "UPDATE current_stock SET amount = ? WHERE id = '1';";
	$prepsetstock = mysqli_prepare($db, $querysetstock);
	mysqli_stmt_bind_param ($prepsetstock, 'i', $newstock);
	mysqli_stmt_execute($prepsetstock);
	$resultsetstock = mysqli_stmt_get_result($prepsetstock);
?>
