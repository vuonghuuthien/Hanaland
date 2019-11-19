<div class="scroll">
    <ul><a id="scroll_1" class="scroll_1 active">Lời Chào&nbsp;<span>|</span></a></ul>
    <ul><a id="scroll_2" class="scroll_2" href="#bestProject">Dự Án Tốt Nhất&nbsp;<span>|</span></a></ul>
    <ul><a id="scroll_3" class="scroll_3" href="#allProject">Tất Cả Dự Án&nbsp;<span>|</span></a></ul>
    <ul><a id="scroll_4" class="scroll_4" href="#contact">Liên Hệ&nbsp;<span>|</span></a></ul>
</div>
<div class="rectangle_1"></div>
<div class="rectangle_2"></div>
<!-- <div class="rectangle_1 rectangle_1_moved"></div>
<div class="rectangle_2 rectangle_2_moved"></div> -->
<div class="welcome" id="welcome">
    <div class="logo_white"></div>
    <div class="title"></div>
    <div id="slogan" class="slogan">Sàn giao dịch bất động sản
        <br>Luôn nhanh chóng và chính xác nhất
    </div>
    <div class="arrowDownDouble" id="arrowDownDouble">
        <div class="arrowDown primera"></div>
        <div class="arrowDown segunda"></div>
    </div>
</div>
<?php
    if ($handle = opendir('./Public/info/contents')) {

        while (false !== ($entry = readdir($handle))) {
    
            if ($entry != "." && $entry != "..") {
    
                echo "$entry\n";
            }
        }
    
        closedir($handle);
    }
?>
<div class="bestProject" id="bestProject">
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <div class="background__slideshow"></div>
        <div class="content_slides">
            <div class="title__slides"></div>
            <div class="intro__slides"></div>
        </div>
        <div class="slideshow" id="carousel">
            <ul class="flip-items">
                <?php
                $countImportant = count($important);
                for ($i = 1; $i <= $countImportant; $i++) {
                    echo ('<li>
                                <img src="./Public/info/contents/'.$i.'/main.jpg">
                                <div class="number_slide">'.$i.' / '.$countImportant.'</div>
                                <div class="title_slide">'.$important[$i]['title'].'</div> 
                                <div class="intro_slide none">'.$important[$i]['intro'].'</div> 
                                <a href="www.gmail.com"> </a>
                            </li>');
                }
                ?>
            
            </ul>
        </div>
    </div>
    <script>
        var carousel = $("#carousel").flipster({
            style: 'carousel',
            spacing: -0.28,
            nav: false,
            buttons:   true,
            scrollwheel: false,
            autoplay: 3000,
            pauseOnHover: true,
            loop: true,
        });
    </script>
    <br>

    <!-- The dots/circles -->
    <!-- <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div> -->
</div>
<div class="allProject" id="allProject">

</div>
<div class="contact footer" id="contact">
    <div class="title__footer">Liên hệ với chúng tôi</div>
    <div class="slogan__footer">Mọi câu hỏi xin liên hệ với chúng tôi. Chúng tôi cam kết luôn nhanh chóng và chính xác nhất.</div>
    <div class="name__footer">Người đại diện : Hoàng Thị Kim Thảo</div>
    <div class="mid__footer">
        <div class="map__footer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.255199215538!2d106.64298631488529!3d10.791755992311106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eb33660be91%3A0x903709229db43852!2zMTgyIELDoHUgQ8OhdCAzLCBQaMaw4budbmcgMTIsIFTDom4gQsOsbmgsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1572207545789!5m2!1svi!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="contact__footer">
            <div class="social__contact__footer">
                <div class="icon1__social__contact__footer icon__social"></div>
                <div class="info__social__contact__footer">thaohoang9595@gmail.com</div>
            </div>
            <div class="social__contact__footer">
                <div class="icon2__social__contact__footer icon__social"></div>
                <div class="info__social__contact__footer">(+84) 982 762 522</div>
            </div>
            <div class="social__contact__footer">
                <div class="icon3__social__contact__footer icon__social"></div>
                <div class="info__social__contact__footer">(+84) 949 735 864</div>
            </div>
            <div class="social__contact__footer">
                <div class="icon4__social__contact__footer icon__social"></div>
                <div class="info__social__contact__footer">www.facebook.com/hoangthi.kimthao</div>
            </div>
            <div class="social__contact__footer">
                <div class="icon5__social__contact__footer icon__social"></div>
                <div class="info__social__contact__footer">182 Bàu Cát 3, Tân Bình - Hồ Chí Minh</div>
            </div>
        </div>
        <div></div>
    </div>
    <div class="copyright__footer">Power by Thomas Wilson - © 2018 Hanaland, Incorporated. All rights reserved.</div>
</div>