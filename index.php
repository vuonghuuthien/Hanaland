<?php
    // Start the session
    session_start();
    if (!isset($_SESSION['inforPage'])) {
        $_SESSION['inforPage'] = array();
        $_SESSION['inforPage']['lang'] = 'vn';
        $_SESSION['inforPage']['page'] = 'home';
        $_SESSION['inforPage']['user'] = '0';
        $_SESSION['inforPage']['url'] = 'index.php?page=home&lang=vn&user=0';
    }
    if (isset($_GET['lang']) and ($_GET['lang'] != $_SESSION['inforPage']['lang'])) {
        $_SESSION['inforPage']['lang'] = $_GET['lang'];
        $_SESSION['inforPage']['url'] = 'index.php?page='.$_SESSION['inforPage']['page'].'&lang='.$_GET['lang'].'&user='.$_SESSION['inforPage']['user'];
    }
    if (isset($_GET['page']) and ($_GET['page'] != $_SESSION['inforPage']['page'])) {
        $_SESSION['inforPage']['page'] = $_GET['page'];
        $_SESSION['inforPage']['url'] = 'index.php?page='.$_GET['page'].'&lang='.$_SESSION['inforPage']['lang'].'&user='.$_SESSION['inforPage']['user'];
    }
    if (isset($_GET['user']) and ($_GET['user'] != $_SESSION['inforPage']['user'])) {
        $_SESSION['inforPage']['user'] = $_GET['user'];
        $_SESSION['inforPage']['url'] = 'index.php?page='.$_SESSION['inforPage']['page'].'&lang='.$_SESSION['inforPage']['lang'].'&user='.$_GET['user'];
    }
    // user 
    if (!isset($_SESSION['user']) or (isset($_GET['user']) and $_GET['user'] == 0)) {
        $_SESSION['user'] = array();
        $_SESSION['inforPage']['user'] = '0';
    }
    // error
    if (!isset($_SESSION['error'])) {
        $_SESSION['error'] = array();
        $_SESSION['error']['login'] = '0';
        $_SESSION['error']['signup'] = '0';
    }
    //
    /*
    if( isset( $_SESSION['counter'] ) ) { 
        $_SESSION['counter'] += 1; 
    } else { 
        $_SESSION['counter'] = 1; 
    } 
    $msg = "Bạn đã vào trang ". $_SESSION['counter']; 
    $msg .= " lần trong phiên này.";
    // Cookie
    if( isset($_COOKIE["login"])) {
        setcookie("username", "Tran Minh Chinh", time()+3600*24*7, "/","", 0);
        setcookie("password", "25", time()+3600*24*7, "/", "",  0);
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./Public/css/all.min.css">
    <script type="text/javascript" src="./Public/js/jquery-3.4.1.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="./Public/css/home/style.css"> -->
    <?php 
        if(isset($_GET['page'])) {
            $controller = $_GET['page'];
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
<body class="<?= $_SESSION['inforPage']['lang'] ?>">
    <div class="navigationBar <?php if($_SESSION['inforPage']['page']!='home') { echo ('navigationBarShort'); }?>">
        <div class="logo"></div>
        <div class="menuNavigation">
            <ul>
                <li><a href="<?php echo (str_replace($_SESSION['inforPage']['page'], 'login', $_SESSION['inforPage']['url'])); 
                                ?>" class="login <?php if($_SESSION['inforPage']['page']=='login') { echo ('active disabled'); } 
                                                        if($_SESSION['inforPage']['user']=='1') { echo ('disabled'); } 
                                                    ?>">Đăng Nhập</a></li>
                <li><a href="<?php echo (str_replace($_SESSION['inforPage']['page'], 'home', $_SESSION['inforPage']['url'])); 
                                ?>" class="home <?php if($_SESSION['inforPage']['page']=='home') { echo ('active disabled'); } ?>">Trang Chủ</a></li>
                <li><a href="<?php echo (str_replace($_SESSION['inforPage']['page'], 'signup', $_SESSION['inforPage']['url'])); 
                                ?>" class="signup <?php if($_SESSION['inforPage']['page']=='signup') { echo ('active disabled'); } 
                                                        if($_SESSION['inforPage']['user']=='1') { echo ('disabled'); } 
                                                    ?>">Đăng Ký</a></li>
            </ul>
        </div>
        <div class="menuHamburger">
            <div class="icon_menuHamburger"></div>
        </div>
        <table class="account <?php if ($_SESSION['inforPage']['user'] == '0') { echo ('none'); } ?>">
            <tr>
                <td class="name_account"><?php echo $_SESSION['user']['username']; ?></td>
                <td rowspan="2" class="avatar_account" style="background: url('./Public/img/users/<?php echo $_SESSION['user']['avatar']; ?>'); 
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: 50% 50%;" >
                </td>
            </tr>
            <tr>
                <td class="logout_account">LOG OUT</td>
            </tr>
        </table>
        <div class="language">
            <ul>
                <li><a class="en_language <?php if($_SESSION['inforPage']['lang']=='en') { echo ('active disabled'); } 
                                            ?>" href="<?= str_replace("vn", "en", $_SESSION['inforPage']['url']); ?>">EN</a></li>
                <li><a class="vn_language <?php if($_SESSION['inforPage']['lang']=='vn') { echo ('active disabled'); } 
                                            ?>" href="<?= str_replace("en", "vn", $_SESSION['inforPage']['url']); ?>">VN</a></li>
            </ul>
            <ul class="info_language">LANGUAGE</ul>
        </div>
    </div>
    <?php //var_dump($_SESSION['user'] ); ?> 
    <div class="navigationBar_temp"></div>
    <?php
        // Kết nối đối Database
        include "Model/DBConfig.php"; // Include file in Model // Nhunwg file khác không cần incldue nữa
        $db = new Database;
        $db->connect();
        // GET variable controller in URL
        if(isset($_GET['page'])) {
            $controller = $_GET['page'];
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
                echo '<script src="./Public/js/login/script.js"></script>';
                break;
            }
            case 'signup': {
                require_once('Controller/signup/index.php');
                break;
            }
            case 'home': {
                require_once('Controller/home/index.php');
                echo '<script src="./Public/js/home/script.js"></script>';
                break;
            }
            default: {
                require_once('Controller/home/index.php');
                echo '<script src="./Public/js/home/script.js"></script>';
                break;
            }
        }
    ?>
    <script src="./Public/js/script.js"></script>
</body>
</html>

<?php
    //session_destroy();
?>