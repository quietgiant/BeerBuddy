<?php

	session_start();

	require_once('db_connection.php');
	$connection = connect_to_db();

	if (empty($_GET['name']) || empty($_GET['address']) || empty($_GET['city']) || empty($_GET['state'])) {
		echo json_encode(['error' => 'Could not determine full address.']);
    	exit;
	}

	$_SESSION['storeName'] = $_GET['name'];
	$_SESSION['purchaseAddress'] = $_GET['address'];
	$_SESSION['purchaseCity'] = $_GET['city'];
	$_SESSION['purchaseState'] = $_GET['state'];

	echo json_encode("success");
	exit;

?>