<?php

	session_start();

    if (isset($_SESSION['authenticated'])) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
    
    exit;
    
?>