<?php
    // Start the session
    session_start();
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'vn';
    }
    if (!isset($_SESSION['href'])) {
        $_SESSION['href'] = 'index.php?lang=vn';
    }
    if (!isset($_SESSION['page'])) {
        $_SESSION['page'] = 'home';
    }
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
        $_SESSION['href'] = 'index.php?lang=' . $_GET['lang'];
    }
    if (isset($_GET['controller'])) {
        $_SESSION['page'] = $_GET['controller'];
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
<body class="<?= $_SESSION['lang'] ?>">
    <div class="navigationBar <?php if($_SESSION['page']!='home') { echo ('navigationBarShort'); }?>">
        <div class="logo"></div>
        <div class="menuNavigation">
            <ul>
                <li><a href="<?php echo($_SESSION['href'] . '&controller=login');?>" class="login <?php if($_SESSION['page']=='login') { echo ('active disabled'); } ?>" onclick="menu('login')">Đăng Nhập</a></li>
                <li><a href="<?php echo($_SESSION['href'] . '&controller=home');?>" class="home <?php if($_SESSION['page']=='home') { echo ('active disabled'); } ?>" onclick="menu('home')">Trang Chủ</a></li>
                <li><a href="<?php echo($_SESSION['href'] . '&controller=signup');?>" class="signup <?php if($_SESSION['page']=='signup') { echo ('active disabled'); } ?>" onclick="menu('signup')">Đăng Ký</a></li>
            </ul>
        </div>
        <div class="menuHamburger">
            <div class="icon"></div>
        </div>
        <?php
            $href = $_SESSION['href'] . '&controller=' . $_SESSION['page']; 
        ?>
        <div class="language">
            <ul>
                <li><a class="en_language <?php if($_SESSION['lang']=='en') { echo ('active disabled'); } ?>" href="<?= str_replace("vn", "en", $href); ?>">EN</a></li>
                <li><a class="vn_language <?php if($_SESSION['lang']=='vn') { echo ('active disabled'); } ?>" href="<?= str_replace("en", "vn", $href); ?>">VN</a></li>
            </ul>
            <ul class="info_language">LANGUAGE</ul>
        </div>
    </div>
    <?php //echo ( $msg ); ?>
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
    <!-- <script src="./Public/js/script.php"></script> -->
    <script src="./Public/js/script.js"></script>
</body>
</html>

<?php
    session_destroy();
?>