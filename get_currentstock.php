<?php
if (!defined('index_origin'))
{
        http_response_code(404);
        die();
}
?>

<?php
	$querycurrentstock = "SELECT amount FROM current_stock WHERE id = '1';";
	$prepcurrentstock = mysqli_prepare($db, $querycurrentstock);
	mysqli_stmt_bind_param ($prepcurrentstock);
	mysqli_stmt_execute($prepcurrentstock);
	$resultcurrentstock = mysqli_stmt_get_result($prepcurrentstock);

	$resultcurrentstock_count = mysqli_num_rows($resultcurrentstock);
 	if ($resultcurrentstock_count == 1)
	{
 		$currentstockrow = mysqli_fetch_array($resultcurrentstock);
		$currentstock = $currentstockrow['amount'];
		echo json_encode($currentstock);
	}
	else
	{
		$currentstock = '0';
		echo json_encode($currentstock);
	}
?>
