<?php
	session_start();
$address = $_SESSION['myAddress']; 
	require_once('db_connection.php');
	$connection = connect_to_db();

	$feed = [];
 
	$buildSql = "SELECT alcohol_type,drink_name,price, size, store_name,address,date,city,state,username 
FROM beerbuddy.deal_posts
INNER JOIN beerbuddy.user_data ON deal_posts.user_id = beerbuddy.user_data.id where CONCAT(deal_posts.address, ', ', deal_posts.city)=  \"".$address."\" ORDER BY beerbuddy.deal_posts.id desc ";

	$sql = $buildSql;
$_SESSION['testSql'] = $sql;

	$result = $connection->query($sql) or die(mysqli_error());     

	while($deal_record = mysqli_fetch_assoc($result)) {
	    $feedItem = new stdClass();
        $feedItem->alcohol_type = $deal_record['alcohol_type'];
        $feedItem->drink_name = $deal_record['drink_name'];
        $feedItem->price = $deal_record['price'];
        $feedItem->size = $deal_record['size'];
        $feedItem->store_name = $deal_record['store_name'];
        $feedItem->address = $deal_record['address'];
        $feedItem->city = $deal_record['city'];
        $feedItem->date = $deal_record['date'];
        $feedItem->username = $deal_record['username'];

	    $feed[] = $feedItem;
	}

	echo json_encode($feed);
	exit;

?>