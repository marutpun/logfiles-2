<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

// import connection, logfile
include_once './config/database.php';
include_once './class/logfile.php';

$database = new Database();
$db = $database->getConnection();

$items = new Logfile($db);

$stmt = $items->getLogfiles();
$itemCount = $stmt->rowCount();

if ($itemCount > 0)
{
    $logFileArray = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $log = array(
            'ID' => $ID,
            'ReceivedAt' => $ReceivedAt,
            'Message' => $Message
        );
        array_push($logFileArray, $log);
    }

    // status 200 ok
    http_response_code(200);
    echo json_encode($logFileArray);
}
else
{
    // status 404 not found
    http_response_code(404);
    echo json_encode(array(
        'message' => 'No record found.'
    ));
}

