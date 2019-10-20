<div class="container_signin">
    <h1 class="title_signin none">Hi ! My friend !</h1>
    
    <form class="form" action="" method="POST">
        <span class="fa fa-user"></span>
        <input type="text" placeholder="User Name" id="username" name="username" required>
        <span class="fa fa-unlock-alt"></span>
        <input type="password" placeholder="Password" id="password" name="password" required>
        <div class="checkbox">
            <input type="checkbox" id="checkbox" name="checkbox" value="Apple"></input>
            <label for="checkbox">Lưu thông tin.</label>
        </div>
        <input type="submit" id="login" name="login" value="Đăng Nhập"></input>
    </form>
    <?php
        if ($m_a_u == 3) {
            header('location: ' . $_SESSION['href'] . '&controller=home');
            /*
            function getCurURL()
            {
                if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                    $pageURL = "https://";
                } else {
                $pageURL = 'http://';
                }
                if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
                    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
                } else {
                    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                }
                return $pageURL;
            }
            //echo getCurURL(); 
            $url_home = str_replace("login", "home", getCurURL());
            header($url_home);
            //echo("<script>location.href = '.$url_home.';</script>");
            */
        }
    ?>
</div>