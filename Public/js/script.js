
//$(document).ready(function(){
$( () => {
    $(".vn .info_language").html("LANGUAGE");
    // menu
    $(".vn .home").html("TRANG CHỦ");
    $(".vn .login").html("ĐĂNG NHẬP");
    $(".vn .signup").html("ĐĂNG KÝ");
    $(".vn .logout_account").html("ĐĂNG XUẤT");

    $(".en .info_language").html("NGÔN NGỮ");
    // menu
    $(".en .home").html("HOME");
    $(".en .login").html("LOG IN");
    $(".en .signup").html("SIGN UP");
    $(".en .logout_account").html("LOG OUT");

    // Sroll To Hide Navigation Bar
    $(window).scroll(() => {
		var windowTop = $(window).scrollTop();
		if (windowTop > 70) {
            $(".navigationBar").addClass("navigationBarShort");
        } else {
            $(".navigationBar").removeClass("navigationBarShort");
        }
    });
    //Click Logo To Scroll To Top
	$(".logo").on("click", () => {
		$("html,body").animate(
			{
				scrollTop: 0
			},
			500
		);
    });

});
