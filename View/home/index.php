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
        <div class="background_slideshow" style="background: url('./Public/info/contents/1/1.png');
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: 50% 50%; ">
        </div>
        <!-- Full-width images with number and caption text -->
        <!-- <div class="mySlides fade" style="background-image: url('./Public/img/contents/001/1.png');
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                        background-position: 50% 50%; ">
            <div class="numbertext">1 / 3</div>
            <div class="text">Caption Text ONE</div>
        </div> -->
        <?php
            //$url = './Public/img/contents/1/1.png';
            $urlContents = './Public/info/contents/';
            $countImportant = count($important);
            //var_dump($important);
            if ($countImportant == 1) {
                echo '<div class="mySlides mySlides_4 ">
                        <img src="./Public/img/contents/1/main.jpg" alt="'.$important[1]['title'].'">
                        <div class="numbertext">1 / 1</div>
                        <div class="text">Caption Text 1</div> 
                    </div>';
            } else if ($countImportant <= 4) {
                for ($i = 3; $i <= 3 + $countImportant - 1; $i++) {
                    echo '<div class="mySlides mySlides_'.$i.' ">
                            <img src="'.$urlContents.($i-2).'/main.jpg" alt="'.$important[$i-2]['title'].'">
                            <div class="numbertext">'.($i-2).' / '.$countImportant.'</div>
                            <div class="text">Caption Text '.($i-2).'</div> 
                        </div>';
                }
            } else if ($countImportant == 5) {
                for ($i = 2; $i <= 2 + $countImportant - 1; $i++) {
                    echo '<div class="mySlides mySlides_'.$i.' ">
                            <img src="'.$urlContents.($i-1).'/main.jpg" alt="'.$important[$i-1]['title'].'">
                            <div class="numbertext">'.($i-1).' / '.$countImportant.'</div>
                            <div class="text">Caption Text '.($i-1).'</div> 
                        </div>';
                }
            } else if ($countImportant == 6) {
                for ($i = 3; $i <= 3 + $countImportant - 1 - 1; $i++) {
                    echo '<div class="mySlides mySlides_'.$i.' ">
                            <img src="'.$urlContents.($i-2).'/main.jpg" alt="'.$important[$i-2]['title'].'">
                            <div class="numbertext">'.($i-2).' / '.$countImportant.'</div>
                            <div class="text">Caption Text '.($i-2).'</div> 
                        </div>';
                }
                echo '<div class="mySlides mySlides_6 none">
                        <img src="./Public/img/contents/4/main.jpg" alt="'.$important[4]['title'].'">
                        <div class="numbertext">4 / 4</div>
                        <div class="text">Caption Text 4</div> 
                    </div>';
            } else {
                for ($i = 1; $i <= 7; $i++) {
                    echo '<div class="mySlides mySlides_'.$i.' ">
                            <img src="'.$urlContents.$i.'/main.jpg" alt="'.$important[$i]['title'].'">
                            <div class="numbertext">'.$i.' / '.$countImportant.'</div>
                            <div class="text">Caption Text '.$i.'</div> 
                        </div>';
                }
                for ($i = 8; $i <= $countImportant; $i++) {
                    echo '<div class="mySlides mySlides_'.$i.' none">
                            <img src="'.$urlContents.$i.'/main.jpg" alt="'.$important[$i]['title'].'">
                            <div class="numbertext">'.$i.' / '.$countImportant.'</div>
                            <div class="text">Caption Text '.$i.'</div> 
                        </div>';
                }
            }
        ?>

        <!-- Next and previous buttons -->
        <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
        <a class="prevSlideshow">&#10094;</a>
        <a class="nextSlideshow">&#10095;</a>
    </div>
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