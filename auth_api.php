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

        $queryapikey = "SELECT id FROM api_keys WHERE apikey = ?;";
        $prepapikey = mysqli_prepare($db, $queryapikey);
        mysqli_stmt_bind_param ($prepapikey, 's', $apikey);
        mysqli_stmt_execute($prepapikey);
        $resultapikey = mysqli_stmt_get_result($prepapikey);

        $result_count = mysqli_num_rows($resultapikey);

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