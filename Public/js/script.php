<?php session_start(); ?>
<?php header("Content-Type: application/javascript"); /* This meant the file can be used in script tag */ ?>

$(document).ready(function(){
    $( ".vn" ).click(function() {
        <?php $_SESSION['lang'] = 'vn';
            $var = $_SESSION['lang'];
            $_SESSION['counter'] = 100;
        ?>
        alert(<?=json_encode($var)?>);
        // lang
        $( ".en" ).removeClass( "active" );
        $( ".vn" ).addClass( "active" );
        $(".info_language").html("LANGUAGE");
        // menu
        $(".home").html("TRANG CHỦ");
        $(".login").html("ĐĂNG NHẬP");
        $(".signup").html("ĐĂNG KÝ");
        $(".slogan").html("Sàn giao dịch bất động sản <br> Luôn nhanh và chính xác nhất");
        // scroll
        $(".scroll_1").html("Lời Chào&nbsp;<span>|</span>");
        $(".scroll_2").html("Dự Án Tốt Nhất&nbsp;<span>|</span>");
        $(".scroll_3").html("Tất Cả Dự Án&nbsp;<span>|</span>");
        $(".scroll_4").html("Liên Hệ&nbsp;<span>|</span>");
    });
    $( ".en" ).click(function() {
        <?php $_SESSION['lang'] = 'en'; 
            $var = $_SESSION['lang'];
            $_SESSION['counter'] = 1;
        ?>
        alert(<?=json_encode($var)?>);
        // lang
        $(".info_language").html("NGÔN NGỮ");
        $( ".vn" ).removeClass( "active" );
        $( ".en" ).addClass( "active" );
        // menu
        $(".home").html("HOME");
        $(".login").html("LOG IN");
        $(".signup").html("SIGN UP");
        $(".slogan").html("Real estate trading floor <br> Always fast and most accurate");
        // scroll
        $(".scroll_1").html("Welcome&nbsp;<span>|</span>");
        $(".scroll_2").html("The Best Project&nbsp;<span>|</span>");
        $(".scroll_3").html("All Projects&nbsp;<span>|</span>");
        $(".scroll_4").html("Contact&nbsp;<span>|</span>");
    });
});
var menuType = "home";
function menu(menuType_new) {
    if (menuType_new !== menuType) {
        if (menuType_new === "home") {

        } else if (menuType === "login") { // login

        } else { // signup

        }
        menuType = "." + menuType;
        menuType_new = "." + menuType_new;
        $(menuType).removeClass( "active" );
        $(menuType_new).addClass( "active" );
        menuType = menuType_new;
    }
}
