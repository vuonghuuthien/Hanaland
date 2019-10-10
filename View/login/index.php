<div class="container_signin">
    <h1 class="title_signin none">Hi ! My friend !</h1>
    
    <form class="form none" action="" method="POST">
        <span class="fa fa-user"></span>
        <input type="text" placeholder="User Name" id="username" name="username">
        <span class="fa fa-unlock-alt"></span>
        <input type="password" placeholder="Password" id="password" name="password">
        <input type="submit" id="login" name="login" value="Log In"></input>
    </form>
    <?php
        if ($m_a_u == 3) {
            header('location: index.php?controller=home');
        }
    ?>
</div>