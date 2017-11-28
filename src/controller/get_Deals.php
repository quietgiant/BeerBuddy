<?php

	session_start();

	require_once('db_connection.php');
	$connection = connect_to_db();

	$feed = [];
 
   //  $_SESSION['boozeType']
   //  $_SESSION['boozeBrand'] 
   //  $_SESSION['boozeName'] 
   //  $_SESSION['boozePrice'] 
	$buildSql = "SELECT alcohol_type,drink_name,price,store_name,address,date,city,state,username 
FROM beerbuddy.deal_posts
INNER JOIN beerbuddy.user_data ON deal_posts.user_id = beerbuddy.user_data.id where ";
	
	$stack = array();

	
	
	if($_SESSION['boozeType']!=null){
		$message = ("alcohol_type like \"%".$_SESSION['boozeType']."%\"");
		array_push($stack,$message);
	}

	if($_SESSION['boozeName']!=null){
		$message = ("drink_name like \"%".$_SESSION['boozeName']."%\"");
		array_push($stack,$message);
	}
	if($_SESSION['boozePrice']!=null){
		$message = ("price <= ".$_SESSION['boozePrice']);
		array_push($stack,$message);
	}
	
	for($i = 0; $i<sizeof($stack);$i++){

			$buildSql = $buildSql. $stack[$i];
		if($i < sizeof($stack)-1){
				$buildSql = $buildSql. " AND ";
		}
		
		
	}
	$buildSql = $buildSql." ORDER BY beerbuddy.deal_posts.id desc LIMIT 15;";

	$_SESSION['mysql'] =$buildSql;
	$sql = $buildSql;

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