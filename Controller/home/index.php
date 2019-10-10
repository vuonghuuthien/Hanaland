<?php
    // include "Model/DBConfig.php"; // Không cần include

    // GEt variable action in URL
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = '';
    }
    // Require file in View
    switch($action) {
        default: {
            require_once('View/home/index.php');
            break;
        }
    }
?>