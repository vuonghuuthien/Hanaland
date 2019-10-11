<?php
    // Start the session
    session_start();
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'vn';
    }

    if( isset( $_SESSION['counter'] ) ) { 
        $_SESSION['counter'] += 1; 
    } else { 
        $_SESSION['counter'] = 1; 
    } 
    $msg = "Bạn đã vào trang ". $_SESSION['counter']; 
    $msg .= " lần trong phiên này.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Public/css/style.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
    <script type="text/javascript" src="./Public/js/jquery-3.4.1.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="./Public/css/home/style.css"> -->
    <?php 
        if(isset($_GET['controller'])) {
            $controller = $_GET['controller'];
        } else {
            $controller = '';
        }
        // Require_once file in Controller // Include vs Include_once vs Require vs Require_once
        switch($controller) {
            case 'users': {
                //require_once('View/thanhvien/add_user.php');
                echo '<link rel="stylesheet" type="text/css" href="./Public/css/users/style.css">';
                break;
            }
            case 'login': {
                echo '<link rel="stylesheet" type="text/css" href="./Public/css/login/style.css">';
                break;
            }
            case 'signup': {
                echo '<link rel="stylesheet" type="text/css" href="./Public/css/signup/style.css">';
                break;
            }
            case 'home': {
                echo '<link rel="stylesheet" type="text/css" href="./Public/css/home/style.css">';
                break;
            }
            default: {
                echo '<link rel="stylesheet" type="text/css" href="./Public/css/home/style.css">';
                break;
            }
        }
    ?>
    <style>
        @font-face { font-family: HelveticaLight; src: url('./Public/fonts/Helvetica/HelveticaLight.ttf'); } 
        @font-face { font-family: HelveticaLightOblique; src: url('./Public/fonts/Helvetica/HelveticaLightOblique.ttf'); } 
        @font-face { font-family: Helvetica; src: url('./Public/fonts/Helvetica/Helvetica.ttf'); } 
        @font-face { font-family: HelveticaBold; src: url('./Public/fonts/Helvetica/HelveticaBold.ttf'); }
        @font-face { font-family: HelveticaBoldOblique; src: url('./Public/fonts/Helvetica/HelveticaBoldOblique.ttf'); }
        @font-face { font-family: HelveticaOblique; src: url('./Public/fonts/Helvetica/HelveticaOblique.ttf'); }
        @font-face { font-family: Myriad; src: url('./Public/fonts/Myriad/MyriadPro-Regular.otf'); }
        @font-face { font-family: CenturyBold; src: url('./Public/fonts/Century/GOTHICB.TTF'); }
        @font-face { font-family: SourceSansPro; src: url('./Public/fonts/SourceSansPro/SourceSansPro.ttf'); }
    </style>
    <title>Hanaland</title>
</head>
<body>
    <div class="navigationBar">
        <div class="background"></div>
        <div class="logo"></div>
        <div class="menuNavigation">
            <ul>
                <li><a href="index.php?&controller=home" class="home active" onclick="menu('home')">Trang Chủ</a></li>
                <li>
                    <a href="index.php?&controller=login" class="login" onclick="menu('login')">Đăng Nhập</a>
                    <a class="space">/</a>
                    <a href="index.php?&controller=signup" class="signup" onclick="menu('signup')">Đăng Ký</a>
                </li>
            </ul>
        </div>
        <div class="menuHamburger">
            <div class="icon"></div>
        </div>
        <div class="language">
            <ul>
                <li><div class="en <?php if ($_SESSION['lang'] == 'en') {echo ('active');} ?>">EN</div></li>
                <li><div class="vn <?php if ($_SESSION['lang'] == 'vn') {echo ('active');} ?>">VN</div></li>
            </ul>
            <ul class="info_language">LANGUAGE</ul>
        </div>
    </div>
    <?php 
        echo $msg;
        echo ( $_SESSION['lang'] ) . '<br>'; 
    ?>
    <div class="navigationBar_temp"></div>
    <?php
        // Kết nối đối Database
        include "Model/DBConfig.php"; // Include file in Model // Nhunwg file khác không cần incldue nữa
        $db = new Database;
        $db->connect();
        // GET variable controller in URL
        if(isset($_GET['controller'])) {
            $controller = $_GET['controller'];
        } else {
            $controller = '';
        }
        // Require_once file in Controller // Include vs Include_once vs Require vs Require_once
        switch($controller) {
            case 'users': {
                //require_once('View/thanhvien/add_user.php');
                require_once('Controller/users/index.php');
                break;
            }
            case 'login': {
                require_once('Controller/login/index.php');
                break;
            }
            case 'signup': {
                require_once('Controller/signup/index.php');
                break;
            }
            case 'home': {
                require_once('Controller/home/index.php');
                //echo '<script src="./Public/js/home/script.js"></script>';
                break;
            }
            default: {
                require_once('Controller/home/index.php');
                break;
            }
        }
    ?>
    <script src="./Public/js/script.php"></script>
</body>
</html>

<?php
    //session_destroy();
?>