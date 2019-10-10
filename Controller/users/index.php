<?php
    // include "Model/DBConfig.php"; // Không cần include

    // GEt variable action in URL
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = '';
    }

    $thanhcong = [];
    // Require file in View
    switch($action) {
        case 'add': {
            if (isset($_POST['add_user'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $sex = $_POST['sex'];
                $birthday = $_POST['birthday'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];

                if($db->InsertData($username, $password, $fullname, $sex, $birthday, $address, $phone, $email)) {
                    $thanhcong[] = 'add_success';
                }
            }
            require_once('View/users/add_user.php');
            break;
        }
        case 'edit': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = "users";
                $dataID = $db->getDataID($tblTable, $id);

                if (isset($_POST['update_user'])) {
                    // Lấy dữ liệu từ View
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $sex = $_POST['sex'];
                    $birthday = $_POST['birthday'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    // Truyền dữ liệu từ View sang Model
                    if ($db->UpdateData($id, $username, $password, $fullname, $sex, $birthday, $address, $phone, $email)) {
                        header('location: index.php?controller=users&action=list');
                    }
                }
            }
            require_once('View/users/edit_user.php');
            break;
        }
        case 'delete': {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tblTable = "users";

                if ($db->Delete($id, $tblTable)) {
                    header('location: index.php?controller=users&action=list');
                }
            }
            else {
                header('location: index.php?controller=users&action=list');   
            }
            //require_once('View/users/delete_user.php');
            break;
        }
        case 'list': {
            $tblTable = "users";
            $data = $db->getAllData($tblTable);
            require_once('View/users/list_user.php');
            break;
        }
        case 'search': {
            if (isset($_GET['tukhoa'])) {
                $key = $_GET['tukhoa'];
                $tblTable = "users";
                $column = "username";
                // Lấy dữ liệu từ Model : file DBConfig.php
                $data_Search = $db->SearchData($tblTable, $column, $key);
            }
            require_once('View/users/search_user.php');
            break;
        }
        default: {
            require_once('View/users/list_user.php');
            break;
        }
    }
?>