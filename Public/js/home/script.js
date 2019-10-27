
var heightScroll1 = $(".welcome").height();
var posScroll2 = $(".bestProject").position();
var heightScroll2 = $(".bestProject").height();
var posScroll3 = $(".allProject").position();
var heightScroll3 = $(".allProject").height();
var posScroll4 = $(".contact").position();
var clickScroll = false;
var posActiveScroll2 = posScroll2.top - heightScroll1/3;
var posActiveScroll3 = posScroll3.top - heightScroll2/3;
var posActiveScroll4 = posScroll4.top - heightScroll3/3;
// rectangle start
var rotateRect = -35.71; // deg
var topRect_1 = 8.2; // vh
var topRect_2 = -11.5; // vh
var rightRect_1 = 5.5; // vw
var rightRect_2 = 45; // vw
var colorRect_1 = 35.71; // deg
// rectangle moved
var rotateRect_1_m = -180; // deg
var rotateRect_2_m = -90; // deg
var topRect_1_m = 100/3; // vh
var topRect_2_m = 100; // vh
var rightRect_1_m = 0; // vw
var rightRect_2_m = 100; // vw
var colorRect_1_m = -90; // deg
// difference start vs moved
var diffRotateRect_1 = posActiveScroll2 / Math.abs(rotateRect_1_m - rotateRect);
var diffRotateRect_2 = posActiveScroll2 / Math.abs(rotateRect_2_m - rotateRect);
var diffTopRect_1 = posActiveScroll2 / Math.abs(topRect_1_m - topRect_1);
var diffTopRect_2 = posActiveScroll2 / Math.abs(topRect_2_m - topRect_2);
var diffRightRect_1 = posActiveScroll2 / Math.abs(rightRect_1_m - rightRect_1);
var diffRightRect_2 = posActiveScroll2 / Math.abs(rightRect_2_m - rightRect_2);
var diffColorRect_1 = posActiveScroll2 / Math.abs(colorRect_1_m - colorRect_1);
//
var temp = 0;

$(".rectangle_1").addClass("rectangle_1_moved");
$(".rectangle_2").addClass("rectangle_2_moved");

$("html,body").animate(
    {
        scrollTop: 0
    },
    500
);

$( () => {
    $(".vn .slogan").html("Sàn giao dịch bất động sản <br> Luôn nhanh và chính xác nhất");
    // scroll
    $(".vn .scroll_1").html("Lời Chào&nbsp;<span>|</span>");
    $(".vn .scroll_2").html("Dự Án Tốt Nhất&nbsp;<span>|</span>");
    $(".vn .scroll_3").html("Tất Cả Dự Án&nbsp;<span>|</span>");
    $(".vn .scroll_4").html("Liên Hệ&nbsp;<span>|</span>");
    //
    $(".en .slogan").html("Real estate trading floor <br> Always fast and most accurate");
    // scroll
    $(".en .scroll_1").html("Welcome&nbsp;<span>|</span>");
    $(".en .scroll_2").html("The Best Project&nbsp;<span>|</span>");
    $(".en .scroll_3").html("All Projects&nbsp;<span>|</span>");
    $(".en .scroll_4").html("Contact&nbsp;<span>|</span>");

    $(window).scroll(() => {
        var windowTop = $(window).scrollTop();
        if (clickScroll == false) {
            if (windowTop < posActiveScroll2) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_1").addClass("active");
            } else if (windowTop < posActiveScroll3) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_2").addClass("active");
            } else if (windowTop < posActiveScroll4) {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_3").addClass("active");
            } else {
                $(".scroll ul a").removeClass("active");
                $(".scroll ul a.scroll_4").addClass("active");
            }
        }
        
        if (windowTop <= posActiveScroll2) {
            $(".rectangle_1").removeClass("none");
            $(".rectangle_2").removeClass("none");
            $(".bestProject").removeClass("bgBestProject");
            // Rectangle 1
            temp = rotateRect - windowTop/diffRotateRect_1;
            $(".rectangle_1_moved").css({
            '-webkit-transform' : 'rotate('+ temp +'deg)',
            '-moz-transform' : 'rotate('+ temp +'deg)',
            '-ms-transform' : 'rotate('+ temp +'deg)',
            'transform' : 'rotate('+ temp +'deg)'});
            temp = topRect_1 + windowTop/diffTopRect_1;
            $(".rectangle_1_moved").css({'top' : temp +'vh'});
            temp = rightRect_1 - windowTop/diffRightRect_1;
            $(".rectangle_1_moved").css({'right' : temp +'vw'});
            temp = colorRect_1 + windowTop/diffColorRect_1;
            $(".rectangle_1_moved").css(
            'background' , 'linear-gradient('+ temp +'deg, #80ca09 0%, #a0e62c 100%)',
            'background' , '-webkit-linear-gradient('+ temp +'deg, #80ca09 0%, #a0e62c 100%)',
            'background' , '-moz-linear-gradient('+ temp +'deg, #80ca09 0%, #a0e62c 100%)',
            'background' , '-ms-linear-gradient('+ temp +'deg, #80ca09 0%, #a0e62c 100%)',
            'background' , '-o-linear-gradient('+ temp +'deg, #80ca09 0%, #a0e62c 100%)');
            // Rectangle 2
            temp = rotateRect - windowTop/diffRotateRect_2;
            $(".rectangle_2_moved").css({
            '-webkit-transform' : 'rotate('+ temp +'deg)',
            '-moz-transform' : 'rotate('+ temp +'deg)',
            '-ms-transform' : 'rotate('+ temp +'deg)',
            'transform' : 'rotate('+ temp +'deg)'});
            temp = topRect_2 + windowTop/diffTopRect_2;
            $(".rectangle_2_moved").css({'top' : temp +'vh'});
            temp = rightRect_2 + windowTop/diffRightRect_2;
            $(".rectangle_2_moved").css({'right' : temp +'vw'});
            
        } else {
            $(".rectangle_1").addClass("none");
            $(".rectangle_2").addClass("none");
            $(".bestProject").addClass("bgBestProject");
        }
        
        //$(".rectangle_1_moved").css({"top" : windowTop});
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
            }, 500, function(){
        
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

    $(".logout_account").on('click', () => {
        $(".account").addClass("none");
        var href = window.location.href;
        href = href.replace("user=1", "user=0");
        location.href = href;
    });

    $(".prevSlideshow").on('click', () => {
        document.querySelector(".mySlides_1").className = "mySlides mySlides_1";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_1").className = "mySlides mySlides_1 moveLeft_mySlides_1";
        });
        document.querySelector(".mySlides_2").className = "mySlides mySlides_2";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_2").className = "mySlides mySlides_2 moveLeft_mySlides_2";
        });
        document.querySelector(".mySlides_3").className = "mySlides mySlides_3";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_3").className = "mySlides mySlides_3 moveLeft_mySlides_3";
        });
        document.querySelector(".mySlides_right").className = "mySlides mySlides_right";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_right").className = "mySlides mySlides_right moveLeft_mySlides_right";
        });
    });
    $(".nextSlideshow").on('click', () => {
        document.querySelector(".mySlides_left").className = "mySlides mySlides_left";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_left").className = "mySlides mySlides_left moveRight_mySlides_left";
        });
        document.querySelector(".mySlides_1").className = "mySlides mySlides_1";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_1").className = "mySlides mySlides_1 moveRight_mySlides_1";
        });
        document.querySelector(".mySlides_2").className = "mySlides mySlides_2";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_2").className = "mySlides mySlides_2 moveRight_mySlides_2";
        });
        document.querySelector(".mySlides_3").className = "mySlides mySlides_3";
        window.requestAnimationFrame(function(time) {
            document.querySelector(".mySlides_3").className = "mySlides mySlides_3 moveRight_mySlides_3";
        });
    });

    // slideshow
});

var slideIndex = 2;
/*
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
*/
function plusSlides(n) {
    if (n>0) {
        $(".mySlides_left").addClass("moveRight_mySlides_left");
        $(".mySlides_1").addClass("moveRight_mySlides_1");
        $(".mySlides_2").addClass("moveRight_mySlides_2");
        $(".mySlides_3").addClass("moveRight_mySlides_3");
        $(".mySlides_right").addClass("moveRight_mySlides_right");
        $(".mySlides_left").removeClass("moveLeft_mySlides_left");
        $(".mySlides_1").removeClass("moveLeft_mySlides_1");
        $(".mySlides_2").removeClass("moveLeft_mySlides_2");
        $(".mySlides_3").removeClass("moveLeft_mySlides_3");
        $(".mySlides_right").removeClass("moveLeft_mySlides_right");
    } else {
        $(".mySlides_left").addClass("moveLeft_mySlides_left");
        $(".mySlides_1").addClass("moveLeft_mySlides_1");
        $(".mySlides_2").addClass("moveLeft_mySlides_2");
        $(".mySlides_3").addClass("moveLeft_mySlides_3");
        $(".mySlides_right").addClass("moveLeft_mySlides_right");
        $(".mySlides_left").removeClass("moveRight_mySlides_left");
        $(".mySlides_1").removeClass("moveRight_mySlides_1");
        $(".mySlides_2").removeClass("moveRight_mySlides_2");
        $(".mySlides_3").removeClass("moveRight_mySlides_3");
        $(".mySlides_right").removeClass("moveRight_mySlides_right");
    }
}

var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows : true,
    },
    pagination: {
      el: '.swiper-pagination',
    },
});




