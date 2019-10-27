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
            $signup = 0;
            $image = '';
            if (isset($_POST['signup'])) {
                if ($_POST['password'] == $_POST['rePassword']) {
                    $username = trim($_POST['username']);
                    $password = md5($_POST['password']);
                    $avatar = $_POST['avatar'];
                    $fullname = $_POST['fullname'];
                    $sex = $_POST['sex'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $tempResult = $db->SearchPrototype('users', 'username', $username);
                    if (is_array($tempResult)) {
                        $_SESSION['error']['signup'] = 'username is exist';
                    } else {
                        if($db->InsertData($username, $password, $avatar, $fullname, $sex, $birthday, $address, $phone, $email)) {
                            $signup = 1;
                            $_SESSION['user']['username'] = $username;
                            $_SESSION['user']['password'] = $password;
                            $_SESSION['user']['avatar'] = $avatar;
                            $_SESSION['user']['fullname'] = $fullname;
                            $_SESSION['user']['sex'] = $sex;
                            $_SESSION['user']['birthday'] = $birthday;
                            $_SESSION['user']['address'] = $address;
                            $_SESSION['user']['phone'] = $phone;
                            $_SESSION['user']['email'] = $email;
                        } else {
                            $_SESSION['error']['signup'] = 'don t insert data user';
                        }
                    }
                } else {
                    $_SESSION['error']['signup'] = 'password and repassword isnt sample';
                }
            }
            require_once('View/signup/index.php');
            break;
        }
    }
?>