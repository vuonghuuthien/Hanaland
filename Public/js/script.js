
var heightScroll1 = $(".welcome").height();
var posScroll2 = $(".bestProject").position();
var heightScroll2 = $(".bestProject").height();
var posScroll3 = $(".allProject").position();
var heightScroll3 = $(".allProject").height();
var posScroll4 = $(".contact").position();
var clickScroll = false;
//$(document).ready(function(){
$( () => {
    $("html,body").animate(
        {
            scrollTop: 0
        },
        500
    );
    $(".vn .info_language").html("LANGUAGE");
    // menu
    $(".vn .home").html("TRANG CHỦ");
    $(".vn .login").html("ĐĂNG NHẬP");
    $(".vn .signup").html("ĐĂNG KÝ");
    $(".vn .slogan").html("Sàn giao dịch bất động sản <br> Luôn nhanh và chính xác nhất");
    // scroll
    $(".vn .scroll_1").html("Lời Chào&nbsp;<span>|</span>");
    $(".vn .scroll_2").html("Dự Án Tốt Nhất&nbsp;<span>|</span>");
    $(".vn .scroll_3").html("Tất Cả Dự Án&nbsp;<span>|</span>");
    $(".vn .scroll_4").html("Liên Hệ&nbsp;<span>|</span>");

    $(".en .info_language").html("NGÔN NGỮ");
    // menu
    $(".en .home").html("HOME");
    $(".en .login").html("LOG IN");
    $(".en .signup").html("SIGN UP");
    $(".en .slogan").html("Real estate trading floor <br> Always fast and most accurate");
    // scroll
    $(".en .scroll_1").html("Welcome&nbsp;<span>|</span>");
    $(".en .scroll_2").html("The Best Project&nbsp;<span>|</span>");
    $(".en .scroll_3").html("All Projects&nbsp;<span>|</span>");
    $(".en .scroll_4").html("Contact&nbsp;<span>|</span>");
    // Sroll To Hide Navigation Bar
    $(window).scroll(() => {
		var windowTop = $(window).scrollTop();
		if (windowTop > 70) {
            $(".navigationBar").addClass("navigationBarShort");
        } else {
            $(".navigationBar").removeClass("navigationBarShort");
        }
        if (clickScroll == false) {
            if (windowTop < (posScroll2.top-heightScroll1/3)) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_1").addClass("active");
            } else if (windowTop < (posScroll3.top-heightScroll2/3)) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_2").addClass("active");
            } else if (windowTop < (posScroll4.top-heightScroll3/3)) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_3").addClass("active");
            } else {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_4").addClass("active");
            }
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
    $(".scroll ul a").on('click', function(event) {

        clickScroll = true;
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
        
            // Store hash
            var hash = this.hash;
        
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
        
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
                clickScroll = false;
            });
        } // End if
    });
    //Click Scroll Welcome To Scroll To Top
	$(".scroll_1").on("click", () => {
		$("html,body").animate(
			{
				scrollTop: 0
			},
			500
        );
        $(".scroll ul a").removeClass("active");
        $(".scroll ul a.scroll_1").addClass("active");
    });
    $(".scroll_2").on("click", () => {
        $(".scroll ul a").removeClass("active");
        $(".scroll ul a.scroll_2").addClass("active");
    });
    $(".scroll_3").on("click", () => {
        $(".scroll ul a").removeClass("active");
        $(".scroll ul a.scroll_3").addClass("active");
    });
    $(".scroll_4").on("click", () => {
        $(".scroll ul a").removeClass("active");
        $(".scroll ul a.scroll_4").addClass("active");
    });
    $(".arrowDownDouble").on("click", () => {
        $('.scroll_2').click(); 
    });
});
