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
            $tblTable = "contents";
            $data = $db->getAllData($tblTable);
            $important = array();
            $index = 0;
            if (is_array($data)) {
                for ($i = 0; $i < count($data); $i++) {
                    if($data[$i]['important']==1) {
                        $important[$index][] = $data[$i]['id'];
                        $important[$index][] = $data[$i]['title'];
                        $important[$index][] = $data[$i]['intro'];
                        $index++;
                    }
                }
            }
            require_once('View/home/index.php');
            break;
        }
    }
?>