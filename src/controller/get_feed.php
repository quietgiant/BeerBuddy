<?php

session_start();

require_once('db_connection.php');
$connection = connect_to_db();

$feed = [];

$sql = sprintf("SELECT alcohol_type, drink_name, price, address, date FROM deal_posts LIMIT 15;");
$result = $connection->query($sql) or die(mysqli_error());     

while($deal_record = mysql_fetch_assoc($result)) {
    $feedItem = new stdClass();
    $feedItem->alcohol_type = $deal_record['alcohol_type'];
    $feedItem->drink_name = $deal_record['drink_name'];
    $feedItem->price = $deal_record['price'];
    $feedItem->address = $deal_record['address'];
    $feedItem->time = $deal_record['date'];

    $feed[] = $feedItem;
}

echo json_encode($feed);
mysql_free_result($result);
$connection->close();
exit;

?>