<?php

    session_start();

    require_once('db_connection.php');
    $connection = connect_to_db();

    $sql = sprintf("SELECT alcohol_type, drink_name, price, store_name, date FROM deal_posts ORDER BY id desc LIMIT 15;");
    $result = $connection->query($sql) or die(mysqli_error());   
    
    $feed = [];

    while($deal_record = mysqli_fetch_assoc($result)) {
        $feedItem = new stdClass();
        $feedItem->alcohol_type = $deal_record['alcohol_type'];
        $feedItem->drink_name = $deal_record['drink_name'];
        $feedItem->price = $deal_record['price'];
        $feedItem->store_name = $deal_record['store_name'];
        $feedItem->date = $deal_record['date'];

        $feed[] = $feedItem;
    }

    echo json_encode($feed);

?>