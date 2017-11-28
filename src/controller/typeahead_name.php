<?php

    require_once('db_connection.php');
    $connection = connect_to_db();
	
    $term = mysqli_real_escape_string($connection, $_POST['term']);
    $sql = "SELECT DISTINCT drink_name FROM deal_posts WHERE drink_name LIKE '%{$term}%'";
    $result = $connection->query($sql) or die(mysqli_error());

    $typeahead_results = [];
    
    while($row = mysqli_fetch_assoc($result)) {
        $typeahead_results[] = $row['drink_name'];
    }
    
    echo json_encode($typeahead_results);

?>


