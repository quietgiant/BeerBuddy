<?php
	session_start();
$address = $_SESSION['myAddress']; 
	require_once('db_connection.php');
	$connection = connect_to_db();

	$feed = [];
 
   //  $_SESSION['boozeType']
   //  $_SESSION['boozeBrand'] 
   //  $_SESSION['boozeName'] 
   //  $_SESSION['boozePrice'] 
	$buildSql = "SELECT alcohol_type,drink_name,price,store_name,address,date,city,state,username 
FROM beerbuddy.deal_posts
INNER JOIN beerbuddy.user_data ON deal_posts.user_id = beerbuddy.user_data.id where CONCAT(deal_posts.address, ', ', deal_posts.city)=  \"".$address."\" ORDER BY beerbuddy.deal_posts.id desc ";

	$sql = $buildSql;
$_SESSION['testSql'] = $sql;

	$result = $connection->query($sql) or die(mysqli_error());     

	while($deal_record = mysqli_fetch_assoc($result)) {
	    $feedItem = new stdClass();
	    $feedItem->username = $deal_record['username'];
	    $feedItem->alcohol_type = $deal_record['alcohol_type'];
	    $feedItem->drink_name = $deal_record['drink_name'];
	    $feedItem->price = $deal_record['price'];
	    $feedItem->store_name = $deal_record['store_name'];
	    $feedItem->address = $deal_record['address'];
	    $feedItem->date = $deal_record['date'];

	    $feed[] = $feedItem;
	}

	echo json_encode($feed);
	exit;

?>