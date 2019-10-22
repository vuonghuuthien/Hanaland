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
            $m_a_u = 0; // -1 delete // 1 manager // 2 admin // 3 user
            $image = '';
            if (isset($_POST['login'])) {
                $username = trim($_POST['username']);
                $password = md5($_POST['password']);
                // Lấy dữ liệu từ Model : file DBConfig.php
                $tempResult = $db->SearchPrototype('users', 'username', $username);
                if (is_array($tempResult)) {
                    if ($tempResult[0]['active'] == 1) {
                        if ($tempResult[0]['password'] === $password) {
                            $_SESSION['inforPage']['user'] = '1';
                            if ($tempResult[0]['position'] == 1) {
                                $m_a_u = 1;
                            } else if ($tempResult[0]['position'] == 2) {
                                $m_a_u = 2;
                            } else {
                                $m_a_u = 3;
                                foreach($tempResult[0] as $key => $value) { 
                                    if (($key != 'id') and ($key != 'active') and ($key != 'position') and !is_int($key))
                                        $_SESSION['user'][$key] = $value;
                                }
                            }
                        }
                    } else {
                        $m_a_u = -1;
                    }
                }
            }
            require_once('View/login/index.php');
            break;
        }
    }
?>