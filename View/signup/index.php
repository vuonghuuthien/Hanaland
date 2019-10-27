<div class="container_signin">
    <h1 class="title_signin none">Hi ! My friend !</h1>
    
    <form class="form" action="" method="POST">
        <span class="fa fa-user"></span>
        <input type="text" placeholder="User Name" id="username" name="username" required>
        <span class="fa fa-unlock-alt"></span>
        <input type="password" placeholder="Password" id="password" name="password" required>
        <span class="fa fa-unlock"></span>
        <input type="password" placeholder="rePassword" id="rePassword" name="rePassword" required>
        <input type="text" placeholder="Avatar" id="avatar" name="avatar">
        <input type="text" placeholder="Fullname" id="fullname" name="fullname">
        <input type="text" placeholder="Sex" id="sex" name="sex">
        <input type="text" placeholder="Birthday" id="birthday" name="birthday">
        <input type="text" placeholder="Address" id="address" name="address">
        <input type="text" placeholder="Phone" id="phone" name="phone">
        <input type="text" placeholder="Email" id="email" name="email">
        <div class="checkbox">
            <input type="checkbox" id="checkbox" name="checkbox" value="Apple"></input>
            <label for="checkbox">Lưu thông tin.</label>
        </div>
        <input type="submit" id="signup" name="signup" value="Đăng Ký"></input>
    </form>
    <?php
        if ($signup == 1) {

            $url_home = str_replace('signup', 'home', $_SESSION['inforPage']['url']);
            $url_home = str_replace('user=0', 'user=1', $url_home);
            //
            if (headers_sent()) {
                echo ('<script type="text/javascript">
                    location.href = "'.$url_home.'";
                </script>');
            }
            else {
                header('Location: '.$url_home);
            }
        } else {
            if ($_SESSION['error']['signup'] != '0') {
                echo ('<script type="text/javascript">
                    alert("'.$_SESSION['error']['signup'].'");
                </script>');
                $_SESSION['error']['signup'] = '0';
            }
        }
    ?>
</div>